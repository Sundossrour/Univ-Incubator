<?php

namespace Database\Seeders;

use App\Models\UserQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        UserQuestion::create([
            'question' => 'q1',
            'details' => 'det1',
            'userID' => '1',
        ]);

        UserQuestion::create([
            'question' => 'q2',
            'details' => 'det2',
            'answer' => 'answer1',
            'answerBy' => '1',
            'userID' => '1',
        ]);
    }
}
