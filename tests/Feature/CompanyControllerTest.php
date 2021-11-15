<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_company_index_page_is_rendering()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/companies');

        $response->assertStatus(200);
    }

    public function test_company_can_be_created()
    {
        // $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/companies', [
            'name'      => 'DXC',
            'logo'      => 'dxc.png',
            'email'     => 'dxc@co.za',
            'sector'    => 'IT',
            'website'   => 'www.dxc.com',
            'phone'     => '09023122312',
            'facebook'  => 'www.facebook.com/dxc',
            'linkedin'  => 'www.linkedin.com/dxc',
            'rating'    => '4',
        ]);

        $response->assertStatus(302);

        $company = Company::first();

        $this->assertEquals(1, Company::count());

        $this->assertEquals('DXC', $company->name);


        // $response->assertStatus(200);
    }
}
