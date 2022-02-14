<?php

use App\Model\Position;

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Left Wing Back
        $position = new Position();
        $position->name_ar = "Left Wing Back";
        $position->name_en = "Left Wing Back";
        $position->save();

        //Right wing back
        $position = new Position();
        $position->name_ar = "Right wing back";
        $position->name_en = "Right wing back";
        $position->save();
        
        // Left wing
        $position = new Position();
        $position->name_ar = "Left wing";
        $position->name_en = "Left wing";
        $position->save();
        // Right wing
        $position = new Position();
        $position->name_ar = "Right wing";
        $position->name_en = "Right wing";
        $position->save();
        // Center Defensive Midfielder
        $position = new Position();
        $position->name_ar = "Center Defensive Midfielder";
        $position->name_en = "Center Defensive Midfielder";
        $position->save();
        // Center Midfielder
        $position = new Position();
        $position->name_ar = "Center Midfielder";
        $position->name_en = "Center Midfielder";
        $position->save();
        // Left Midfielder
        $position = new Position();
        $position->name_ar = "Left Midfielder";
        $position->name_en = "Left Midfielder";
        $position->save();
        // Right Midfielder
        $position = new Position();
        $position->name_ar = "Right Midfielder";
        $position->name_en = "Right Midfielder";
        $position->save();
        // Central Attacking Midfielder
        $position = new Position();
        $position->name_ar = "Central Attacking Midfielder";
        $position->name_en = "Central Attacking Midfielder";
        $position->save();
        // Center Forward
        $position = new Position();
        $position->name_ar = "Center Forward";
        $position->name_en = "Center Forward";
        $position->save();
        // Right forward
        $position = new Position();
        $position->name_ar = "Right forward";
        $position->name_en = "Right forward";
        $position->save();
        // Left forward
        $position = new Position();
        $position->name_ar = "Left forward";
        $position->name_en = "Left forward";
        $position->save();
        // Striker
        $position = new Position();
        $position->name_ar = "Striker";
        $position->name_en = "Striker";
        $position->save();
        // Goal keeper
        $position = new Position();
        $position->name_ar = "Goal keeper";
        $position->name_en = "Goal keeper";
        $position->save();
        // Center Back
        $position = new Position();
        $position->name_ar = "Center Back";
        $position->name_en = "Center Back";
        $position->save();
        // Right back
        $position = new Position();
        $position->name_ar = "Right back";
        $position->name_en = "Right back";
        $position->save();
        // Left back
        $position = new Position();
        $position->name_ar = "Left back";
        $position->name_en = "Left back";
        $position->save();
    }
}

