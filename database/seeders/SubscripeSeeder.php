<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Subscripe;
use App\Models\User;
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
        $users_id = User::all()->pluck('id')->toArray();
        $companies_id = Company::all()->pluck('id')->toArray();

       foreach ($users_id as $user_id){
           foreach ($companies_id as $company_id) {
               $subscripe = new Subscripe();
               $subscripe->user_id = $user_id;
               $subscripe->company_id = $company_id;
               $subscripe->save();
           }
       }

    }
}
