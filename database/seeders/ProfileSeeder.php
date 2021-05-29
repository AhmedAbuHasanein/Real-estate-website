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
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker){
        $array_id = Account::all()->pluck('id')->toArray();
        $gender_select = $faker->randomElement(['male', 'female']);
        $gender = $faker->randomElement(['ذكر', 'أنثى']);
        $country = $faker->randomElement(['فلسطين','مصر','سوريا','الأردن','الكويت','السعودية','لبنان']);
        foreach($array_id as $id){
             $profile = new profile();
             $profile->first_name = $faker->firstName($gender_select) ;
            $profile->last_name = $faker->lastName ;
            $profile->country = $country ;
            $profile->gender = $gender ;
            $profile->dob = $faker->dateTimeBetween('1980-01-01', '2006-12-31')
                ;
            $profile->phone_number = $faker->phoneNumber ;
            $profile->address_1 = $faker->address;
            $profile->address_2 = $faker->secondaryAddress ;
            if ($gender_select=="male"){
                $profile->profile_image = 'asset/image_profile_users/male.jpg';
            }else{
                $profile->profile_image = 'asset/image_profile_users/female.jpg';
            }
            $profile->account_id = $id ;
            $profile->save();
        }
    }
}
