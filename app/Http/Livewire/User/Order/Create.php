<?php

namespace App\Http\Livewire\User\Order;

use Closure;
use App\Models\School;
use App\Models\Profile;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
use App\Forms\Components\LabelOnly;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Wizard\Step;
use App\Http\Controllers\DocumentController;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Concerns\InteractsWithForms;

class Create extends Component implements HasForms
{   
    use InteractsWithForms;

    public string $name;
    public int $school_id;
    public string $student_id;
    public string $graduated_at;
    public $user;
    public $old_ijazah;
    public $old_transkrip;
    public $ijazah;
    public $transkrip;
    public $editDocument;
    public $document;
    public $delivery_method = "home";
    public string $full_address = "Belum ada alamat rumah yang ditambahkan";
    public string $address;
    public string $city;
    public string $province;
    public string $country;
    public string $postcode;

    public $is_ijazah_idn = false;
    public $is_transkrip_idn = false;
    public $is_ijazah_eng = false;
    public $is_transkrip_eng = false;
    
    public int $document_id;
    public $ijazah_idn = 0;
    public $transkrip_idn = 0;
    public $ijazah_eng = 0;
    public $transkrip_eng = 0;

    public $price_amount = 0;
    
    protected function getFormSchema(): array
    {
        $ijazahFileName = $this->user->id.'-ijazah-'. Str::random(16);
        $transkripFileName = $this->user->id.'-transkrip-'. Str::random(16);

        $nameForm = TextInput::make('name')
                ->label('Nama Pemesan')
                ->required();
        $phoneForm = TextInput::make('phone')
                ->label('Nomor Handphone')
                ->tel()
                ->telRegex('/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/')
                ->required();

        $deliveryMethodForm = Radio::make('delivery_method')
                ->label('Metode Pengiriman')
                ->options([
                    'school' => 'Ambil di Alamat Sekolah',
                    'home' => 'Kirim ke Alamat Rumah',
                ])->reactive()
                ->afterStateUpdated(fn ($state) => $this->delivery_method = $state);

        $addressForm = TextInput::make('address')
                ->label('Alamat Rumah')
                ->required();
        $AddressExistLabel = LabelOnly::make('address')
                ->label('Alamat Rumah')
                ->helperText($this->full_address);

        $isIjazahIdnForm = Checkbox::make('is_ijazah_idn')
                ->label('Ijazah')
                ->hint('Rp2000 Perlembar')
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->is_ijazah_idn = $state);
        $ijazahIdnForm = TextInput::make('ijazah_idn')
                ->label('Jumlah Lembar')
                ->extraAttributes(['class' => 'w-20'])
                ->numeric()
                ->rules('min:1')
                ->hidden(fn()=>$this->is_ijazah_idn == false)
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->ijazah_idn = $state);

        $isIjazahEngForm = Checkbox::make('is_ijazah_eng')
                ->label('Ijazah')
                ->reactive()
                ->hint('Rp4000 Perlembar')
                ->afterStateUpdated(fn ($state) => $this->is_ijazah_eng = $state);
        $ijazahEngForm = TextInput::make('ijazah_eng')
                ->label('Jumlah Lembar')
                ->extraAttributes(['class' => 'w-20'])
                ->numeric()
                ->rules('min:1')
                ->hidden(fn()=>$this->is_ijazah_eng == false)
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->ijazah_eng = $state);

        $isTranskripIdnForm = Checkbox::make('is_transkrip_idn')
                ->label('Transkrip')
                ->reactive()
                ->hint('Rp2000 Perlembar')
                ->afterStateUpdated(fn ($state) => $this->is_transkrip_idn = $state);
        $transkripIdnForm = TextInput::make('transkrip_idn')
                ->label('Jumlah Lembar')
                ->extraAttributes(['class' => 'w-20'])
                ->numeric()
                ->rules('min:1')
                ->hidden(fn()=>$this->is_transkrip_idn == false)
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->transkrip_idn = $state);

        $isTranskripEngForm = Checkbox::make('is_transkrip_eng')
                ->label('Transkrip')
                ->reactive()
                ->hint('Rp4000 Perlembar')
                ->afterStateUpdated(fn ($state) => $this->is_transkrip_eng = $state);
        $transkripEngForm = TextInput::make('transkrip_eng')
                ->label('Jumlah Lembar')
                ->extraAttributes(['class' => 'w-20'])
                ->numeric()
                ->rules('min:1')
                ->hidden(fn()=>$this->is_transkrip_eng == false)
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->transkrip_eng = $state);
        $documentConfirmationForm = LabelOnly::make('document_confirmation')
                ->label('Total dokumen yang dipesan')
                ->helperText(
                    '('.$this->ijazah_idn.') Ijazah Bahasa Indonesia <br/>' .
                    '('.$this->ijazah_eng.') Ijazah Bahasa Inggris <br/>' .
                    '('.$this->transkrip_idn.') Transkrip Nilai Bahasa Indonesia <br/>' .
                    '('.$this->transkrip_eng.') Transkrip Nilai Bahasa Inggris <br/>'
                );
        $priceAmoutForm = LabelOnly::make('payment_method_label')
                ->label('Pilih Metode Pembayaran');
        
        $orderFormData = [
            $nameForm,
            $phoneForm,
            $deliveryMethodForm
        ];

        $documentFormData = [                
            Fieldset::make('Translasi Bahasa Indonesia')
                ->schema([
                    $isIjazahIdnForm, 
                    $ijazahIdnForm, 

                    $isTranskripIdnForm, 
                    $transkripIdnForm,
                ]),

            Fieldset::make('Translasi Bahasa Inggris')
                ->schema([
                    $isIjazahEngForm, 
                    $ijazahEngForm,
                    
                    $isTranskripEngForm,
                    $transkripEngForm,
                ]),
        ];

        $paymentFormData = [
            $documentConfirmationForm,
            $priceAmoutForm,
        ];
        
        if ($this->delivery_method == "home") {
            if ($this->user->profile) {
                array_push($orderFormData, $AddressExistLabel);
            } else {
                array_push($orderFormData, $isAddressForm);
            }
        }

        $steps = [Wizard::make([
                    Wizard\Step::make('Data Pemesan')
                        ->schema($orderFormData),
                    Wizard\Step::make('Data Dokumen')
                        ->schema($documentFormData),
                    Wizard\Step::make('Pilih Metode Pembayaran')
                        ->schema($paymentFormData),
                    ])
                    ->startOnStep(1)
                    ->submitAction(new HtmlString('<button type="submit" class="normal-case btn btn-primary btn-sm">Lanjut Pembayaran</button>'))
                ];

        return $steps;
    }

    public function mount(): void 
    {
        $this->user = Auth::user();
        $this->document = Document::where('user_id', $this->user->id)->first();

        $ijazahIdnPrice = $this->ijazah_idn * 2000;
        $transkripIdnPrice = $this->transkrip_idn * 2000;
        $ijazahEngPrice = $this->ijazah_eng * 4000;
        $transkripEngPrice = $this->transkrip_eng * 4000;

        $this->price_amount = $ijazahIdnPrice + $transkripIdnPrice + $ijazahEngPrice + $transkripEngPrice;

        // set Address
        if ($this->user->profile) {
            $this->address = $this->user->profile->address;
            $this->city = $this->user->profile->city;
            $this->province = $this->user->profile->province;
            $this->country = $this->user->profile->country;
            $this->postcode = $this->user->profile->postcode;
            $this->full_address = $this->address . ', ' . $this->city . ', ' . $this->province . ', ' . $this->country . ', ' . $this->postcode;
        }

        $this->form->fill([
            'user_id' => $this->user->id,
            'name' => $this->user->name,
            'price_amount' => $this->price_amount,
        ]);
    }

    public function setActive($state){
        return $this->active = $state;
    }
    public function store(){
        dd($this->form->getState());
        $update = true;
        if ($update) {
            Notification::make() 
                    ->title($message. ' Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                return redirect('/order');
        }else {
            Notification::make() 
                ->title($message. ' Gagal')
                ->body('Terdapat gangguan pada sistem')
                ->danger()
                ->duration(5000)
                ->send();
        }
    }
    
    public function render()
    {
        return view('livewire.user.order.create-filament');
    }
}
