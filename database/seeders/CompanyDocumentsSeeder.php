<?php

namespace Database\Seeders;

use App\Models\Company_Documents;
use Illuminate\Database\Seeder;

class CompanyDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company_Documents::factory()->count(30)->create();
    }
}
