<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            ['id' => 1, 'level' => 'Primary'],
            ['id' => 2, 'level' => 'Mid School'],
            ['id' => 3, 'level' => 'High School'],
            ['id' => 4, 'level' => 'University'],
            ['id' => 5, 'level' => 'IB'],
            ['id' => 6, 'level' => 'GCSE'],
        ];
        foreach($levels as $level){
            Level::create($level);
        }
    }
}
