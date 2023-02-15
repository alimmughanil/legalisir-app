<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Order;
use App\Models\School;
use App\Models\Payment;
use App\Models\Profile;
use Livewire\Component;
use App\Models\Document;
use App\Models\Shipment;
use App\Models\RajaOngkirAddress;
use Kavist\RajaOngkir\RajaOngkir;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;


class Create extends Component implements HasForms
{   
    use InteractsWithForms;
      
    public $active = 1, $addressEdit = false;
    public $disableOption = [2,3];
    public $user;
    public $cityByProvince, $provinceList, $courierServiceList, $courierTypeList;

    public $ijazah_idn_qty = 5, $ijazah_eng_qty = 0, $transkrip_idn_qty = 0, $transkrip_eng_qty = 0, $document_price = 10000,
           $name, $phone,$email, $price_amount,
           $school_address, $province_destination, $city_destination, $postcode, $address, $province_id, $city_id, $province, $city,
           $courier_type, $courier_service, $courier_price, $payment_method = 'auto';
    
    public function __construct()
    {
        $this->user = Auth::user();
        $this->getProvinces();
        $this->price_amount = $this->document_price;
        $this->courierTypeList = ['JNE', 'TIKI', 'POS'];
        $school = School::where('id', $this->user->profile->school_id)
            ->with('rajaOngkirAddress')
            ->first(); 
        $this->school_address = $school->rajaOngkirAddress;
    }
    public function updatedProvinceDestination()
    {
        if ($this->province_destination) {
            $province = json_decode($this->province_destination);
            $this->province_id = $province->province_id;
            $this->getCities($province->province_id);
        }
    }
    public function updatedCityDestination()
    {
        if ($this->city_destination) {
            $city = json_decode($this->city_destination);
            $this->city_id = $city->city_id;
            $this->postcode = $city->postal_code;
        }
    }
    public function updatedCourierType()
    {
        if ($this->courier_type) {
            $this->getCourierServices($this->courier_type);
        }
    }
    public function updatedCourierService()
    {
        if ($this->courier_service) {
            $courier_service = json_decode($this->courier_service);
            $this->courier_price = $courier_service->cost[0]->value;
            $this->price_amount = $this->document_price + $this->courier_price;
        }
    }

    public function mount(): void 
    {
        $this->orderForm->fill([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'phone' => $this->user->profile?->phone,
            'address_id' => $this->user->profile?->address_id,
        ]);
    }

    protected function getOrderFormSchema(): array
    {
        return [
             TextInput::make('name')
                ->label('Nama Lengkap'),
            TextInput::make('phone')
                ->label('Nomor Handphone')
                ->tel()
                ->telRegex('/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/'),
            TextInput::make('email')
                ->label('Email')
                ->email(),
            // // TextInput::make('address')
            // //     ->label('Alamat Lengkap'),
            // Select::make('province_destination')
            //     ->label('Pilih Provinsi Tujuan')
            //     ->options($this->getProvinces())
            //     ->reactive()
            //     ->afterStateUpdated(function ($state) {
            //         $this->getCities($state);
            //     })
            //     ->searchable()
            //     ->required(),
            // Select::make('city_destination')
            //     ->label('Pilih Kota Tujuan')
            //     ->options($this->cityByProvince)
            //     ->reactive()
            //     ->searchable()
            //     ->required(),
        ];
    }


    protected function getForms(): array 
    {
        return [
            'orderForm' => $this->makeForm()
                ->schema($this->getOrderFormSchema()),
        ];
    }

    public function setQty($type, $props)
    {
       if ($type == 'minus') {
           $this->$props = $this->$props - 1;
           if (substr($props,-7) == "idn_qty") {
            $this->document_price -= 2000;
           }
           if (substr($props,-7) == "eng_qty") {
            $this->document_price -= 4000;
           }
       }
       if ($type == 'plus') {
            $this->$props = $this->$props + 1;
            if (substr($props,-7) == "idn_qty") {
            $this->document_price += 2000;
           }
           if (substr($props,-7) == "eng_qty") {
            $this->document_price += 4000;
           }
       }
       $this->price_amount = $this->document_price + $this->courier_price;
    }

    public function getCourierServices($courier_type)
    {
        $rajaOngkir = new RajaOngkir(env('RAJAONGKIR_API_KEY'));
        $courierServices = $rajaOngkir->ongkosKirim([
            'origin'        => $this->school_address->city_id,     
            'destination'   => $this->city_id,      
            'weight'        => 1000,    
            'courier'       => strtolower($courier_type)    
        ])->get();

        return $this->courierServiceList = $courierServices[0]['costs'];
    }

    public function getProvinces()
    {
        $rajaOngkir = new RajaOngkir(env('RAJAONGKIR_API_KEY'));
        $provinces = $rajaOngkir->provinsi()->all();
        $province = [];
        foreach ($provinces as $value) {
            $province += [$value['province_id'] => $value['province']];
        }
        return $this->provinceList = $provinces;
    }

    public function getCities($province_id)
    {
        $rajaOngkir = new RajaOngkir(env('RAJAONGKIR_API_KEY'));
        $cities = $rajaOngkir->kota()->dariProvinsi($province_id)->get();
        $city = [];
        foreach ($cities as $value) {
            $city += [$value['city_id'] => $value['city_name']];
        }
        // return $this->cityByProvince = $city;
        return $this->cityByProvince = $cities;
    }
    
    public function store(){
        $this->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'ijazah_idn_qty' => ['required','numeric','min:1'],
            'payment_method' => ['required'],
            'courier_type' => ['required'],
            'courier_service' => ['required'],
        ]);
        $document = Document::select('id')->where('user_id', $this->user->id)->first();
        if ($this->phone) {
            $this->user->profile->update([
                'phone' => $this->phone
            ]);
        }
        if ($this->province_destination && $this->city_destination) {
            $province = json_decode($this->province_destination);
            $city = json_decode($this->city_destination);
            $address = RajaOngkirAddress::create([
                'city_id' => $city->city_id,
                'province_id' => $province->province_id,
                'address' => $this->address,
                'city' => $city->type . ' ' . $city->city_name,
                'province' => $province->province,
                'postcode' => $this->postcode,
            ]);
            if ($this->user->profile->address_id) {
                $addressOld = RajaOngkirAddress::where('id', $this->user->profile->address_id)->first();
                $addressOld->delete();

                $this->user->profile->update([
                    'address_id' => $address->id
                ]);
            } else{
                $this->user->profile->update([
                    'address_id' => $address->id
                ]);
            }
            
        }
        
        $order = Order::create([
            'user_id' => $this->user->id,
            'document_id' => $document->id,
            'transaction_id' => $this->user->id . rand(1111111111,9999999999),
            'ijazah_idn_qty' => $this->ijazah_idn_qty,
            'transkrip_idn_qty' => $this->transkrip_idn_qty,
            'ijazah_eng_qty' => $this->ijazah_eng_qty,
            'transkrip_eng_qty' => $this->transkrip_eng_qty,
            'price_amount' => $this->price_amount,
        ]);
        $payment = Payment::create([
            'user_id' => $this->user->id,
            'order_id' => $order->id,
        ]);
        $shipment = Shipment::create([
            'user_id' => $this->user->id,
            'order_id' => $order->id,
            'origin_address_id' => $this->school_address->id,
            'destination_address_id' => $this->user->profile->address_id,
            'courier_type' => $this->courier_type,
            'courier_service' => $this->courier_service,
            'courier_price' => $this->courier_price,
        ]);

        $message = 'Pesan Legalisir Dokumen';
        if ($order) {
            Notification::make() 
                    ->title($message. ' Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                // return redirect('/order?active=payment');
                return redirect('/payment/'.$payment->id);
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
        return view('livewire.user.order.create');
    }
}