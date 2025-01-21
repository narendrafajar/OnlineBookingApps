<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProvinceCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provincesAndCities = [
            'Aceh' => ['Banda Aceh', 'Sabang', 'Langsa', 'Lhokseumawe', 'Meulaboh'],
            'Sumatera Utara' => ['Medan', 'Binjai', 'Tebing Tinggi', 'Pematang Siantar', 'Sibolga'],
            'Sumatera Barat' => ['Padang', 'Bukittinggi', 'Payakumbuh', 'Solok', 'Sawahlunto'],
            'Riau' => ['Pekanbaru', 'Dumai', 'Bagansiapiapi', 'Selat Panjang'],
            'Kepulauan Riau' => ['Tanjung Pinang', 'Batam', 'Karimun', 'Bintan'],
            'Jawa Barat' => ['Bandung', 'Bekasi', 'Bogor', 'Depok', 'Cimahi'],
            'Jawa Tengah' => ['Semarang', 'Surakarta', 'Magelang', 'Pekalongan', 'Tegal'],
            'Jawa Timur' => ['Surabaya', 'Malang', 'Kediri', 'Blitar', 'Madiun'],
            'DKI Jakarta' => ['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Barat', 'Jakarta Timur', 'Jakarta Selatan'],
            'Bali' => ['Denpasar', 'Tabanan', 'Singaraja', 'Bangli', 'Gianyar'],
        ];

        foreach ($provincesAndCities as $provinceName => $cities) {
            $provinceId = DB::table('provinces')->insertGetId(['province_name' => $provinceName]);

            foreach ($cities as $cityName) {
                DB::table('cities')->insert([
                    'province_id' => $provinceId,
                    'city_name' => $cityName,
                ]);
            }
        }
    }
}
