<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUserExist = User::where('email','admin@admin')->first();
        if(!$adminUserExist){
            User::create([
                'first_name'=>'Super',
                'last_name'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=>Hash::make('123456'),
                'type'=>User::$_TYPE_ADMIN,
               

            ]);

        }
    }
}
