<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Facial',
            'Rambut',
            'Kuku',
            'Tubuh',
            'Makeup'
        ];

        foreach ($categories as $category) {
            Categories::create(['category_name' => $category]);
        }
    }
}
