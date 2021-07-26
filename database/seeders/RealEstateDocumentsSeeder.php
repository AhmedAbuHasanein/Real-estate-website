<?php

namespace Database\Seeders;

use App\Models\RealEstateDocuments;
use Illuminate\Database\Seeder;

class RealEstateDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RealEstateDocuments::factory()->count(30)->create();
    }
}
