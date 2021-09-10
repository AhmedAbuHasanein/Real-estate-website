<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Realestate;
use App\Models\Realestate_type;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CanDeleteRealestateTypeTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_delete_realestate_type()
    {
        $this->withoutExceptionHandling();

        $account = Account::factory()->create();

        $this->actingAs($account);

        $count_before = Realestate_type::all()->count();
        $realestate_type = Realestate::factory()->create();
        $this->get(route('admin_delete_realestate_type', $realestate_type))
            ->assertSessionHas('success','تم حذف نوع العقار بنجاح');

        $count_after = Realestate_type::all()->count();

        $this->assertEquals(--$count_before, $count_after);

    }
}
