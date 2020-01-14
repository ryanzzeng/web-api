<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $num = 20;
        $questions = factory(App\Question::class, $num)->create();
    }
}
