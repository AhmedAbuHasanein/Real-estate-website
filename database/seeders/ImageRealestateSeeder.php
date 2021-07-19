<?php

namespace Database\Seeders;

use App\Models\Image_Realestate;
use App\Models\Realestate;
use Database\Factories\ImageRealestateFactory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ImageRealestateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $realestates_id = Realestate::all()->pluck('id')->toArray();
        for($i = 0 ; $i<100; $i++){
            $image_realestate = new Image_Realestate();
            $image_realestate->realestate_id = $faker->randomElement($realestates_id);
            $image_realestate->url = 'asset\visitor\img\francesca-tosolini-XcVm8mn7NUM-unsplash.jpg' ;
            $image_realestate->save();
        }

    }
}
