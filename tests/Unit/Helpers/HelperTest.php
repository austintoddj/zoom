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

    /** @test */
    public function it_generates_a_gravatar_url_from_a_given_email()
    {
        $this->assertEquals('https://secure.gravatar.com/avatar/5658ffccee7f0ebfda2b226238b1eb6e', Helper::gravatar('email@example.com'));
    }
}
