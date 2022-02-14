<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeederTable::class);
        $this->call(PositionSeeder::class);
        $this->call(AgeBracketSeeder::class);
        $this->call(TimeSeeder::class);
        $this->call(WeekdaySeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(TrainerSeeder::class);
    }
}
