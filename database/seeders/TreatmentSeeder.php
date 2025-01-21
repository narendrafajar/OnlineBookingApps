<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Treatments;
use App\Models\Therapist;
use Illuminate\Support\Str;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treatment = [
            [
                'name' => 'Glow Facial',
                'image_storage' => 'glow-facial.jpeg',
                'category_id' => 1,
                'price' => 250000,
                'desc' => 'Perawatan wajah yang membantu kulit tampak cerah dan bercahaya.',
                'recomend' => '0'
            ],
            [
                'name' => 'Anti-Aging',
                'image_storage' => 'antiaging.jpg',
                'category_id' => 1,
                'price' => 300000,
                'desc' => 'Perawatan khusus untuk mengurangi tanda-tanda penuaan seperti kerutan dan garis halus.',
                'recomend' => '1'
            ],
            [
                'name' => 'Acne',
                'image_storage' => 'salon.jpg',
                'category_id' => 1,
                'price' => 220000,
                'desc' => 'Perawatan efektif untuk mengurangi jerawat dan bekas jerawat.',
                'recomend' => '0'
            ],

            [
                'name' => 'Spa',
                'image_storage' => 'salon.jpg',
                'category_id' => 2,
                'price' => 150000,
                'desc' => 'Perawatan rambut untuk memperbaiki dan menjaga kesehatan rambut.',
                'recomend' => '0'
            ],
            [
                'name' => 'Coloring',
                'image_storage' => 'hair-coloring.jpg',
                'category_id' => 2,
                'price' => 500000,
                'desc' => 'Memberikan warna baru pada rambut Anda sesuai keinginan.',
                'recomend' => '0'
            ],
            [
                'name' => 'Cut',
                'image_storage' => 'salon.jpg',
                'category_id' => 2,
                'price' => 75000,
                'desc' => 'Potongan rambut sesuai dengan gaya dan tren terkini.',
                'recomend' => '1'
            ],

            [
                'name' => 'Manicure',
                'image_storage' => 'salon.jpg',
                'category_id' => 3,
                'price' => 100000,
                'desc' => 'Perawatan kuku tangan agar terlihat bersih, rapi, dan cantik.',
                'recomend' => '0'
            ],
            [
                'name' => 'Pedicure',
                'image_storage' => 'salon.jpg',
                'category_id' => 3,
                'price' => 120000,
                'desc' => 'Perawatan kuku kaki untuk kebersihan dan kesehatan kaki.',
                'recomend' => '1'
            ],
            [
                'name' => 'Nail Art',
                'image_storage' => 'salon.jpg',
                'category_id' => 3,
                'price' => 200000,
                'desc' => 'Dekorasi seni kuku dengan desain kreatif yang unik.',
                'recomend' => '0'
            ],

            [
                'name' => 'Body Scrub',
                'image_storage' => 'salon.jpg',
                'category_id' => 4,
                'price' => 180000,
                'desc' => 'Eksfoliasi kulit tubuh untuk mengangkat sel kulit mati dan memberikan kulit yang halus.',
                'recomend' => '1'
            ],
            [
                'name' => 'Massage Therapy',
                'image_storage' => 'salon.jpg',
                'category_id' => 4,
                'price' => 300000,
                'desc' => 'Pijat relaksasi untuk melepaskan ketegangan otot dan stres.',
                'recomend' => '0'
            ],
            [
                'name' => 'Slimming',
                'image_storage' => 'salon.jpg',
                'category_id' => 4,
                'price' => 400000,
                'desc' => 'Perawatan untuk membantu mengurangi lemak tubuh dan mendapatkan bentuk tubuh ideal.',
                'recomend' => '0'
            ],

            [
                'name' => 'Party',
                'image_storage' => 'salon.jpg',
                'category_id' => 5,
                'price' => 600000,
                'desc' => 'Makeup untuk acara pesta agar tampil memukau dan percaya diri.',
                'recomend' => '1'
            ],
            [
                'name' => 'Bridal',
                'image_storage' => 'salon.jpg',
                'category_id' => 5,
                'price' => 1000000,
                'desc' => 'Riasan khusus untuk pengantin agar terlihat anggun di hari istimewa.',
                'recomend' => '0'
            ],
            [
                'name' => 'Everyday',
                'image_storage' => 'salon.jpg',
                'category_id' => 5,
                'price' => 400000,
                'desc' => 'Makeup natural untuk keseharian agar terlihat segar dan menarik.',
                'recomend' => '1'
            ],
        ];

        $therapistId = Therapist::pluck('id')->toArray();

        if(empty($therapistId)){
            $this->command->warn('Therapist kosong!, Mohon untuk dump seed TherapistSeeder dahulu!');
            return;
        }

        foreach ($treatment as $treatment) {
            Treatments::create([
                'category_id' => $treatment['category_id'],
                'image_treatments' => $treatment['image_storage'],
                'treatment_code' => 'TRT-' . strtoupper(Str::random(6)),
                'treatment_name' => $treatment['name'],
                'treatment_desc' => $treatment['desc'],
                'therapist_id' => $therapistId[array_rand($therapistId)],
                'treatment_price' => $treatment['price'],
                'treatment_recomend' => $treatment['recomend'],
            ]);
        }
    }
}
