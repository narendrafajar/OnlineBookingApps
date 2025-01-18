<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Therapist;

class TherapistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <= 8 ; $i++) { 
            Therapist::create([
                'therapist_code' => $this->generateTherapistCode($i),
                'therapist_name' => fake()->name
            ]);
        }
    }

    private function generateTherapistCode($sequence)
    {
        $date = now()->format('dmY');
        $formatSequence = str_pad($sequence,6,'0',STR_PAD_LEFT);
        return "TRP-{$date}{$formatSequence}";
    }
}
