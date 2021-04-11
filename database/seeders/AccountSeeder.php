<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account1 = new Account();
        $account1->user_name = "asdasd";
        $account1->email = "asd@asd.com";
        $account1->password = Hash::make("asdasd");
        $account1->save();
    }
}
