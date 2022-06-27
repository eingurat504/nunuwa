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
         $admin->name = 'Super Admin';
         $admin->email = 'admin@admin.com';
         $admin->password = bcrypt("123456789");  //password - ingurat504;
         $admin->save();

    }
}
