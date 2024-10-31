<?php

use Illuminate\Database\Seeder;
use App\EdecxAdmin;
use Illuminate\Support\Facades\Hash;

class EdecxAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = EdecxAdmin::create(
            [
            'fname' => 'Admin',
            'lname' =>'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'price' => '10'
            ]
        );
    }
}
