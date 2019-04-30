<?php

namespace Zoom\Tests\Console;

use Zoom\Tests\TestCase;

class InstallCommandTest extends TestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        /*
         * We need to skip the installation test until there is a better way to reset
         * the entire App folder within testbench-core, since zoom:install will
         * register and publish a Service Provider into the Laravel app.
         *
         * @link https://github.com/cnvs/canvas/issues/456
         */
        $this->markTestSkipped();
    }

    /** @test */
    public function install_assets_and_configuration()
    {
        $this->artisan('zoom:install')
            ->expectsOutput('Publishing the assets...')
            ->expectsOutput('Publishing the configuration file...')
            ->expectsOutput('Running the database migrations...')
            ->expectsOutput('[✔] Zoom is installed and ready to use. Enjoy!')
            ->assertExitCode(0);
        $this->assertFileExists(config_path('zoom.php'));
        $this->assertDirectoryExists(public_path('vendor/zoom'));
    }
}
