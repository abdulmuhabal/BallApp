<?php

use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->role = 'ADMIN';
        $user->name = 'Admin Admin';
        $user->email = 'admin@graphl.com';
        $user->phone = 1234567891;
        $user->password = bcrypt('adminadmin');
        $user->save();

        $user = new User();
        $user->role = 'TRAINER';
        $user->name = 'Trainer Trainer';
        $user->email = 'user@graphl.com';
        $user->phone = 1234567892;
        $user->password = bcrypt('adminadmin');
        $user->save();

        $user = new User();
        $user->role = 'PLAYER';
        $user->name = 'Player Player';
        $user->email = 'player@graphl.com';
        $user->phone = 1234567893;
        $user->password = bcrypt('adminadmin');
        $user->save();
        
    }
}
