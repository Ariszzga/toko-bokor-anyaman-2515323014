<?php

namespace Database\Seeders;

use App\Models\Pengrajin;
use Illuminate\Database\Seeder;

class PengrajinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengrajin::create(['name' => 'Ni Made Ayu Kartika', 'city' => 'Gianyar']);
        Pengrajin::create(['name' => 'I Wayan Sudiarta', 'city' => 'Tabanan']);
        Pengrajin::create(['name' => 'Kadek Agus Wirawan', 'city' => 'Bangli']);
        Pengrajin::create(['name' => 'Ni Wayan Suartini', 'city' => 'Klungkung']);
    }
}
