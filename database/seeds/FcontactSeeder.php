<?php

use Illuminate\Database\Seeder;
use App\ContactUs;

class FcontactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fcontact = ContactUs::create(
            [
                'id' => '1',
            'contactno' => '1234567890',
            'emailid' =>'info@edecx.com',
            'address' => 'test test test test ',
            'maplink' => 'https://www.google.com/maps/search/reborn+kuwait/@29.3097981,47.9717239,13.75z',
            'fabout' => 'test test test'
            ]
        );
    }
}
