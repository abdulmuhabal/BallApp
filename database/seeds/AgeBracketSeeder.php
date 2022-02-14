<?php

use App\Model\AgeBracket;

use Illuminate\Database\Seeder;

class AgeBracketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $age = new AgeBracket();
        $age->name_ar = "18-24";
        $age->name_en = "18-24";
        $age->min = 18;
        $age->max = 24;
        $age->save();

        $age = new AgeBracket();
        $age->name_ar = "20-26";
        $age->name_en = "20-26";
        $age->min = 20;
        $age->max = 26;
        $age->save();

        $age = new AgeBracket();
        $age->name_ar = "30-45";
        $age->name_en = "30-45";
        $age->min = 30;
        $age->max = 45;
        $age->save();

        // 'name_ar',
        // 'name_en',
        // 'min',
        // 'max',
    }
}
