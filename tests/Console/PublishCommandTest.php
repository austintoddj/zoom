<?php

namespace Zoom\Tests\Console;

use Zoom\Tests\TestCase;

class PublishCommandTest extends TestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function publish_assets_and_configuration()
    {
        $this->artisan('zoom:publish')
            ->expectsOutput('[✔] Zoom assets have published successfully.')
            ->assertExitCode(0);
        $this->assertFileExists(config_path('zoom.php'));
        $this->assertDirectoryExists(public_path('vendor/zoom'));
    }
}
