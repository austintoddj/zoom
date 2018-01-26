<?php

namespace Tests\Feature;

use Tests\TestCase;

class BaseTest extends TestCase
{
    /** @test */
    public function it_can_access_the_public_index_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}