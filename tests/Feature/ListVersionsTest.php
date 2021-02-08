<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListVersionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads()
    {
        $response = $this->get(route('versions.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_loads_lang()
    {
        $response = $this->get(route('versions.index.lang', ['lang' => 'pl']));

        $response->assertStatus(200);
    }
}
