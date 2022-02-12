<?php

namespace Asdh\LaravelFlatpickr\Tests;

use Asdh\LaravelFlatpickr\LaravelFlatpickrServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelFlatpickrServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // config()->set('database.default', 'testing');
    }
}
