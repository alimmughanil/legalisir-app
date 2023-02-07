<?php

namespace Database\Seeders;

use App\Models\RajaOngkirAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RajaOngkirAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RajaOngkirAddress::create([
            'city_id' => 22,
            'province_id' => 9,
            'address' => 'Jl. Soedirman no. 171',
            'city' => 'Kabupaten Bandung',
            'province' => 'Jawa Barat',
            'postcode' => '40311',
        ]);
        RajaOngkirAddress::create([
            'city_id' => 34,
            'province_id' => 9,
            'address' => 'Jl. Soedirman no. 172',
            'city' => 'Kabupaten Banjar',
            'province' => 'Jawa Barat',
            'postcode' => '46311',
        ]);
        RajaOngkirAddress::create([
            'city_id' => 149,
            'province_id' => 9,
            'address' => 'Jl. Soedirman no. 173',
            'city' => 'Kabupaten Indramayu',
            'province' => 'Jawa Barat',
            'postcode' => '45214',
        ]);
        RajaOngkirAddress::create([
            'city_id' => 472,
            'province_id' => 10,
            'address' => 'Jl. Soedirman no. 174',
            'city' => 'Kabupaten Tegal',
            'province' => 'Jawa Tengah',
            'postcode' => '52419',
        ]);
    }
}