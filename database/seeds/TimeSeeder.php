<?php
use App\Model\Time;

use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new Time();
        $time->name_ar = "9:00pm - 10:00pm";
        $time->name_en = "9:00pm - 10:00pm";
        $time->starttime = "9:00pm";
        $time->endtime = "10:00pm";
        $time->save();

        $time = new Time();
        $time->name_ar = "6:00am - 7:00am";
        $time->name_en = "6:00am - 7:00am";
        $time->starttime = "6:00am";
        $time->endtime = "7:00am";
        $time->save();

    }
}
