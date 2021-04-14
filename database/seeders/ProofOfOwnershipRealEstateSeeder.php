<?php

namespace Database\Seeders;

use App\Models\Proof_Of_Ownership_RealEstate;
use Illuminate\Database\Seeder;

class ProofOfOwnershipRealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proof_Of_Ownership_RealEstate::factory()->count(50)->create();
    }
}
