<?php

use Illuminate\Database\Seeder;
use App\ClassType;

class ClasstypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classtypes = [
            ['id' => 1, 'classtype' => 'Online'],
            ['id' => 2, 'classtype' => 'Tutor&#8217s Place'],
            ['id' => 3, 'classtype' => 'My Place'],
        ];

        foreach($classtypes as $classtype)
        {
            ClassType::create($classtype);
        }
    }
}
