<?php

namespace Tests\Unit\Helpers;

use Tests\TestCase;
use App\Helpers\Routes\Parser;

class RouteParserTest extends TestCase
{
    /** @test */
    public function it_strips_the_protocol_identifier_from_a_url()
    {
        $this->assertEquals('example.com', Parser::parseUrl('https://example.com'));
    }
}
