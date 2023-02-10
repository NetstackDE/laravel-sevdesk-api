<?php

namespace NetstackDE\LaravelSevdeskApi\Tests\Unit;

use NetstackDE\LaravelSevdeskApi\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_publish_config()
    {
        $this->artisan('vendor:publish', [
            '--provider' => 'NetstackDE\LaravelSevdeskApi\SevdeskApiServiceProvider',
            '--tag'=>'config'
        ]);

        $this->assertFileExists(config_path('sevdesk-api.php'));
        $this->assertFileIsReadable(config_path('sevdesk-api.php'));
        $this->assertFileEquals(config_path('sevdesk-api.php'), __DIR__ . '/../../config/config.php');
        $this->assertTrue(unlink(config_path('sevdesk-api.php')));
    }
}
