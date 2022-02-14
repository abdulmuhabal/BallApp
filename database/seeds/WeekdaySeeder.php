<?php

use App\Model\Weekday;

use Illuminate\Database\Seeder;

class WeekdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weekday = new Weekday;
        $weekday->name_ar = "Monday";
        $weekday->name_ar = "Monday";
        $weekday->save();

        $weekday = new Weekday;
        $weekday->name_ar = "Tuesday";
        $weekday->name_ar = "Tuesday";
        $weekday->save();

        $weekday = new Weekday;
        $weekday->name_ar = "Wednesday";
        $weekday->name_ar = "Wednesday";
        $weekday->save();

        $weekday = new Weekday;
        $weekday->name_ar = "Thursday";
        $weekday->name_ar = "Thursday";
        $weekday->save();
        $weekday = new Weekday;
        $weekday->name_ar = "Friday";
        $weekday->name_ar = "Friday";
        $weekday->save();

        $weekday = new Weekday;
        $weekday->name_ar = "Saturday";
        $weekday->name_ar = "Saturday";
        $weekday->save();
        
        $weekday = new Weekday;
        $weekday->name_ar = "Sunday";
        $weekday->name_ar = "Sunday";
        $weekday->save();

    }
}
