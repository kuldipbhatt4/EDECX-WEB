<?php

use Illuminate\Database\Seeder;
use App\Days;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            ['id' => 1, 'day' => 'SUNDAY'],
            ['id' => 2, 'day' => 'MONDAY'],
            ['id' => 3, 'day' => 'TUESDAY'],
            ['id' => 4, 'day' => 'WEBNESDAY'],
            ['id' => 5, 'day' => 'THURSDAY'],
            ['id' => 6, 'day' => 'FRIDAY'],
            ['id' => 7, 'day' => 'SATURDAY'],
        ];
        foreach($days as $day){
            Days::create($day);
        }
    }
}
