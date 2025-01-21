<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $cities = DB::table('cities')
            ->join('provinces', 'cities.province_id', '=', 'provinces.id')
            ->select('cities.id as city_id', 'cities.city_name', 'provinces.province_name')
            ->limit(5) // Batasi hanya 5 data
            ->get();

        foreach ($cities as $city) {
            DB::table('locations')->insert([
                'city_id' => $city->city_id,
                'location_name' => $city->city_name . ' - ' . $city->province_name,
                'location_address' => $faker->streetAddress . ', ' . $city->city_name . ', ' . $city->province_name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
