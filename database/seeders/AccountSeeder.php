<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $account1->user_name = "adminadmin";
        $account1->email = "admin@admin.com";
        $account1->password = Hash::make("adminadmin");
        $account1->remember_token = Str::random(10);
        $account1->save();
        $admin = new Admin();
        $admin->account_id = $account1->id;
        $admin->save();

        $account2 = new Account();
        $account2->user_name = "compamycompany";
        $account2->email = "company@company.com";
        $account2->password = Hash::make("compamycompany");
        $account2->remember_token = Str::random(10);
        $account2->save();
        $Company = new Company();
        $Company->account_id = $account2->id;
        $Company->company_name = "company alhaia";
        $Company->ssid  = 4047849017;
        $Company->score = 100;
        $Company->save();

        $account3 = new Account();
        $account3->user_name = "useruser";
        $account3->email = "user@user.com";
        $account3->password = Hash::make("useruser");
        $account3->remember_token = Str::random(10);
        $account3->save();
        $user = new User();
        $user->account_id = $account3->id;
        $user->save();

        Account::factory()->count(30)->create();
    }
}
