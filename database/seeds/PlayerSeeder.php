<?php

use App\Model\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $player = Player::create([
            'user_id' => 3,
            'location' => "",
            'location_long' => 757373.37,
            'location_lat' => 757373.37,
            'gender' => 'MALE',
            'age' => 28 ,
            'favorite_position_id' => 1,
            'height' => 150,
            'weight' => 70,
        ]);
    }
}
