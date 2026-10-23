<?php

namespace Database\Seeders;

use App\Models\Bokor;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BokorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $upacara = Category::where('name', 'Upacara Adat')->first();
        $dekorasi = Category::where('name', 'Dekorasi Rumah')->first();
        $suvenir = Category::where('name', 'Suvenir')->first();

        Bokor::create([
            'category_id' => $upacara->id,
            'name' => 'Bokor Anyaman Lidi Klasik',
            'artisan_name' => 'Ni Made Ayu Kartika',
            'material' => 'Lidi kelapa',
            'price' => 85000,
        ]);

        Bokor::create([
            'category_id' => $upacara->id,
            'name' => 'Bokor Anyaman Janur Banten',
            'artisan_name' => 'Ni Wayan Suartini',
            'material' => 'Janur',
            'price' => 65000,
        ]);

        Bokor::create([
            'category_id' => $dekorasi->id,
            'name' => 'Bokor Anyaman Bambu Ukir',
            'artisan_name' => 'I Wayan Sudiarta',
            'material' => 'Bambu',
            'price' => 120000,
        ]);

        Bokor::create([
            'category_id' => $dekorasi->id,
            'name' => 'Bokor Anyaman Rotan Minimalis',
            'artisan_name' => 'I Made Sutrisna',
            'material' => 'Rotan',
            'price' => 135000,
        ]);

        Bokor::create([
            'category_id' => $suvenir->id,
            'name' => 'Bokor Anyaman Pandan Warna',
            'artisan_name' => 'Kadek Agus Wirawan',
            'material' => 'Daun pandan',
            'price' => 95000,
        ]);

        Bokor::create([
            'category_id' => $suvenir->id,
            'name' => 'Bokor Mini Anyaman Lidi',
            'artisan_name' => 'Ni Komang Trisna Dewi',
            'material' => 'Lidi kelapa',
            'price' => 45000,
        ]);
    }
}
