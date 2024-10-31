<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['id' => 1, 'subject_app_icon' => '1606128568.jpeg','subject_web_icon' => '1606128568.jpeg','subject_name' => 'Math'],
            ['id' => 2, 'subject_app_icon' => '1606128722.jpeg','subject_web_icon' => '1606128568.jpeg','subject_name' => 'Science'],
            ['id' => 3, 'subject_app_icon' => '1606128961.jpeg','subject_web_icon' => '1606128568.jpeg','subject_name' => 'English'],
            ['id' => 4, 'subject_app_icon' => '1606129036.jpeg','subject_web_icon' => '1606128568.jpeg','subject_name' => 'French'],
            ['id' => 5, 'subject_app_icon' => '1606129070.jpeg','subject_web_icon' => '1606128568.jpeg','subject_name' => 'Chemistry'],
            ['id' => 6, 'subject_app_icon' => '1606129142.jpeg','subject_web_icon' => '1606128568.jpeg','subject_name' => 'Physics'],
            ['id' => 7,'subject_app_icon' => '1606129185.jpeg','subject_web_icon' => '1606128568.jpeg','subject_name' => 'Biology'],
            ['id' => 8,'subject_app_icon' => '1606129293.jpeg','subject_web_icon' => '1606128568.jpeg','subject_name' => 'Arabic'],
        ];

        foreach($subjects as $subject){
            Subject::create($subject);
        }

    }
 }

