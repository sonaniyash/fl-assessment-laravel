<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    public function test_cities()
    {
        $city = City::factory()->create();

        $response = $this->get('/');

        $response->assertSee($city->name);
    }

    public function test_create_a_new_city()
    {
        $city = City::factory()->create();

        $this->post('/create', $city->toArray());

        $this->assertEquals(1, City::all()->count());
    }
}
