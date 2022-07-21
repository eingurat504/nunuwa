<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $user = new User();
         $user->name = 'Super user';
         $user->email = 'user@user.com';
         $user->password = bcrypt("123456789");  //password - ingurat504;
         $user->save();

    }
}
