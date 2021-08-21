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
        $account1->remember_token = Str::random(50);
        $account1->save();
        $admin = new Admin();
        $admin->account_id = $account1->id;
        $admin->grade = 1;
        $admin->add_admin = true;
        $admin->update_admin = true;
        $admin->delete_admin = true;
        $admin->show_admin = true;
        $admin->add_realestate_type = true;
        $admin->update_realestate_type = true;
        $admin->delete_realestate_type = true;
        $admin->show_realestate_type = true;
        $admin->delete_realestate = true;
        $admin->show_realestate = true;
        $admin->delete_user = true;
        $admin->show_user = true;
        $admin->delete_company = true;
        $admin->show_company = true;
        $admin->save();

        $account2 = new Account();
        $account2->user_name = "companycompany";
        $account2->email = "company@company.com";
        $account2->password = Hash::make("companycompany");
        $account2->remember_token = Str::random(50);
        $account2->save();
        $company = new Company();
        $company->account_id = $account2->id;
        $company->company_name = "شركة الحياة";
        $company->ssid  = 4047849017;
        $company->score = 100;
        $company->logo_image ='asset/logo_images/logo_image.jpg';
        $company->save();

        $account3 = new Account();
        $account3->user_name = "useruser";
        $account3->email = "user@user.com";
        $account3->password = Hash::make("useruser");
        $account3->remember_token = Str::random(50);
        $account3->save();
        $user = new User();
        $user->account_id = $account3->id;
        $user->save();

        Account::factory()->count(30)->create();
    }
}
