<?php

use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $num = 10;
        $patients = factory(App\Patient::class, $num)->create();
    }
}
