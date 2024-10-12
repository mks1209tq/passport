<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\EmployeePP;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmployeePPController
 */
final class EmployeePPControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $employeePPs = EmployeePP::factory()->count(3)->create();

        $response = $this->get(route('employee-p-ps.index'));

        $response->assertOk();
        $response->assertViewIs('employeePP.index');
        $response->assertViewHas('employeePPs');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('employee-p-ps.create'));

        $response->assertOk();
        $response->assertViewIs('employeePP.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmployeePPController::class,
            'store',
            \App\Http\Requests\EmployeePPStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('employee-p-ps.store'));

        $response->assertRedirect(route('employeePPs.index'));
        $response->assertSessionHas('employeePP.id', $employeePP->id);

        $this->assertDatabaseHas(employeePPs, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $employeePP = EmployeePP::factory()->create();

        $response = $this->get(route('employee-p-ps.show', $employeePP));

        $response->assertOk();
        $response->assertViewIs('employeePP.show');
        $response->assertViewHas('employeePP');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $employeePP = EmployeePP::factory()->create();

        $response = $this->get(route('employee-p-ps.edit', $employeePP));

        $response->assertOk();
        $response->assertViewIs('employeePP.edit');
        $response->assertViewHas('employeePP');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmployeePPController::class,
            'update',
            \App\Http\Requests\EmployeePPUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $employeePP = EmployeePP::factory()->create();

        $response = $this->put(route('employee-p-ps.update', $employeePP));

        $employeePP->refresh();

        $response->assertRedirect(route('employeePPs.index'));
        $response->assertSessionHas('employeePP.id', $employeePP->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $employeePP = EmployeePP::factory()->create();

        $response = $this->delete(route('employee-p-ps.destroy', $employeePP));

        $response->assertRedirect(route('employeePPs.index'));

        $this->assertSoftDeleted($employeePP);
    }
}
