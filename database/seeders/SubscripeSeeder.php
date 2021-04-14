<?php

namespace Database\Seeders;

use App\Models\Subscripe;
use Illuminate\Database\Seeder;

class SubscripeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscripe::factory()->count(50)->create();
    }
}
