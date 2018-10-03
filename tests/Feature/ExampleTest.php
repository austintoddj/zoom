<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function example_feature_test()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
