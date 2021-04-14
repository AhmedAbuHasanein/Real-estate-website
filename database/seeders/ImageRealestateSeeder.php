<?php

namespace Database\Seeders;

use App\Models\Image_Realestate;
use Illuminate\Database\Seeder;

class ImageRealestateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image_Realestate::factory()->count(100)->create();
    }
}
