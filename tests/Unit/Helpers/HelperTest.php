<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Helpers\Helper;

class HelperTest extends TestCase
{
    /** @test */
    public function it_strips_the_protocol_identifier_from_a_url()
    {
        $this->assertEquals('example.com', Helper::stripProtocolIdentifier('https://example.com'));
    }
}
