<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Realestate;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DeleteRealEstateTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_delete_realestate()
    {
        $this->withoutExceptionHandling();

        $account = Account::factory()->create();

        $this->actingAs($account);

        $count_before = Realestate::all()->count();
        $realestate = Realestate::factory()->create();
        $this->get(route('company_delete_realestate', $realestate))
            ->assertSessionHas('success','تم حذف العقار بنجاح');

        $count_after = Realestate::all()->count();

        $this->assertEquals(--$count_before, $count_after);

    }
}
