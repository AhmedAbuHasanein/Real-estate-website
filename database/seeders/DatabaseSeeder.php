<?php

namespace Database\Seeders;

use App\Models\Realestate_type;
use App\Models\RealEstateDocuments;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AccountSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(RealestateTypeSeeder::class);
        $this->call(RealestateSeeder::class);
        $this->call(ImageRealestateSeeder::class);
        $this->call(SubscripeSeeder::class);
        $this->call(CompanyDocumentsSeeder::class);
        $this->call(RealEstateDocumentsSeeder::class);
        }
}
