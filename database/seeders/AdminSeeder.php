<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $admin = new Admin();
         $admin->name = 'emmanuel ituka';
         $admin->email = 'eingurat@gmail.com';
         $admin->password = md5("ingurat504");  //password - ingurat504;
         $admin->save();

    }
}
