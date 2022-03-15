<?php

namespace Andreger\C3\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Andreger\C3\C3ServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use InteractsWithViews;

    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            C3ServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
