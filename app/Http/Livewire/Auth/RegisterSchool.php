<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\School;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;
use App\Models\RajaOngkirAddress;
use Kavist\RajaOngkir\RajaOngkir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class RegisterSchool extends Component implements HasForms
{
    use InteractsWithForms;
    public string $name;
    public string $phone;
    public string $email;
    public string $password;   
    public string $passwordConfirmation; 
    public $school_icon;
    public $activeSchool;
    public $cityByProvince, $provinceList;
    public $school_address, $province_origin, $city_origin, $postcode, $address, $province_id, $city_id, $province, $city;

    public function __construct()
    {
        $this->getProvinces();
    }

    public function updatedProvinceOrigin()
    {
        if ($this->province_origin) {
            $province = json_decode($this->province_origin);
            $this->province_id = $province->province_id;
            $this->getCities($province->province_id);
        }
    }
    public function updatedCityOrigin()
    {
        if ($this->city_origin) {
            $city = json_decode($this->city_origin);
            $this->city_id = $city->city_id;
            $this->postcode = $city->postal_code;
        }
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

    protected function getSchoolFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Nama Sekolah')
                ->required(),
            TextInput::make('phone')
                ->label('Nomor Telepon Sekolah')
                ->required(),
            FileUpload::make('school_icon')
                ->label('Upload Logo Sekolah')
                ->image()
                ->extraAttributes(['class'=>"w-[70vw] border-box sm:w-[20rem]"])
                ->disk('public')
                ->directory('school-icon')
                ->preserveFilenames()
                ->required(),
        ];
    }
    protected function getLoginFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email Sekolah')
                ->email()
                ->required(),
            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(),
            TextInput::make('passwordConfirmation')
                ->label('Ulangi Password')
                ->password()
                ->required(),
        ];
    }
    protected function getForms(): array 
    {
        return [
            'schoolForm' => $this->makeForm()
                ->schema($this->getSchoolFormSchema()),
            'loginForm' => $this->makeForm()
                ->schema($this->getLoginFormSchema()),
        ];
    }

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'address' => ['required'],
            'postcode' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $schoolForm = $this->schoolForm->getState();
        $loginForm = $this->loginForm->getState();

        $user = User::create([
            'email' => $loginForm['email'],
            'name' => $schoolForm['name'],
            'password' => Hash::make($loginForm['password']),
            'remember_token'=> Str::random(16),
            'role'=>'Admin'
        ]);

        $province = json_decode($this->province_origin);
        $city = json_decode($this->city_origin);
        $address = RajaOngkirAddress::create([
            'city_id' => $city->city_id,
            'province_id' => $province->province_id,
            'address' => $this->address,
            'city' => $city->type . ' ' . $city->city_name,
            'province' => $province->province,
            'postcode' => $this->postcode,
        ]);
            
        $school = School::create([
            'user_id' => $user->id,
            'school_address_id' => $address->id,
            'school_name' => $schoolForm['name'],
            'school_phone' => $schoolForm['phone'],
            'school_icon' => '/storage/'.$schoolForm['school_icon'],
        ]);
        if ($school) {
            return redirect('/login')->with('status','Registrasi akun berhasil, silahkan login terlebih dahulu');
        } else {
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.auth.register-school')->extends('layouts.auth');
    }
}