<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PlanController
 */
class PlanControllerTest extends TestCase
{
    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('plan.create'));

        $response->assertOk();
        $response->assertViewIs('admin.pages.plans.create');
    }
}
