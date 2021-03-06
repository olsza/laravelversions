<?php

namespace Tests\Feature;

use App\Models\LaravelVersion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowVersionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads()
    {
        $version = LaravelVersion::factory()->create([
            'ends_securityfixes_at' => now()->addYear(),
        ]);
        $response = $this->get(route('versions.show', [$version->__toString()]));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_loads_is_not_date_in_ends_bugfixes_at()
    {
        $version = LaravelVersion::factory()->create([
            'ends_bugfixes_at' => null,
        ]);
        $response = $this->get(route('versions.show', [$version->__toString()]));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_loads_is_not_date_in_ends_securityfixes_at()
    {
        $version = LaravelVersion::factory()->create([
            'ends_securityfixes_at' => null,
        ]);
        $response = $this->get(route('versions.show', [$version->__toString()]));

        $response->assertStatus(200);
    }
}
