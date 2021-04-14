<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\profile;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        $array_id = Account::all()->pluck('id')->toArray();
        $gender = $faker->randomElement(['male', 'female']);
        foreach($array_id as $id){
             $profile = new profile();
             $profile->first_name = $faker->firstName($gender) ;
            $profile->last_name = $faker->lastName ;
            $profile->gender = $gender ;
            $profile->dob = $faker->dateTimeBetween('1980-01-01', '2012-12-31')
                ->format('d/m/Y');
            $profile->phone_number = $faker->phoneNumber ;
            $profile->address_1 = $faker->address;
            $profile->address_2 = $faker->secondaryAddress ;
            $profile->profile_image = $faker->imageUrl() ;
            $profile->account_id = $id ;
        }
    }
}
