<?php

use App\Model\Trainer;

use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer = Trainer::create([
            'user_id'=> 2,
            'bio'=> "Test bio here",
            'location'=> "",
            'location_long' => 757373.37,
            'location_lat' => 757373.37,
            'gender'=> 'MALE',
            'age'=> 29,
            'price'=> 20.50,
            'documents'=> "testdocs.jpg",
            'instagram_url'=> "https://example.org/",
            'youtube_url'=> "https://example.org/",
            'twitter_url'=> "https://example.org/",
            'whatsapp'=> "https://example.org/",
        ]);
    }
}
