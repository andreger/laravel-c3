<?php

namespace LaravelC3;

use Illuminate\Support\ServiceProvider;
use LaravelC3\View\Component\Line;
use LaravelC3\View\Component\Pie;
use LaravelC3\View\Component\Spline;

class LaravelC3ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $prefix = 'c3';
        $this->loadViewsFrom(__DIR__ . '/../resources/views', $prefix);
        $this->loadViewComponentsAs($prefix, $this->viewComponents());
    }

    public function register()
    {

    }

    private function viewComponents()
    {
        return [
            Line::class,
            Pie::class,
            Spline::class,
        ];
    }
}
