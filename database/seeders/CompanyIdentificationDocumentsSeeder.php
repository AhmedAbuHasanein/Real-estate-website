<?php

namespace Database\Seeders;

use App\Models\Company_Identification_Documents;
use Illuminate\Database\Seeder;

class CompanyIdentificationDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company_Identification_Documents::factory()->count(50)->create();
    }
}
