<?php

namespace Database\Seeders;

use App\Models\Realestate;
use Illuminate\Database\Seeder;

class RealestateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Realestate::factory()->count(50)->create();
    }
}
