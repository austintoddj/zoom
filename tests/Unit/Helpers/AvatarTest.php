<?php

namespace Tests\Unit\Helpers;

use Tests\TestCase;
use App\Helpers\Images\Avatar;

class AvatarTest extends TestCase
{
    /** @test */
    public function it_generates_a_gravatar_url_from_a_given_email()
    {
        $this->assertEquals('https://secure.gravatar.com/avatar/5658ffccee7f0ebfda2b226238b1eb6e?s=200', Avatar::generateGravatar('email@example.com'));
    }
}
