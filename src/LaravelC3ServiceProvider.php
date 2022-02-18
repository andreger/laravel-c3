<?php

namespace LaravelC3;

use Illuminate\Support\ServiceProvider;
use LaravelC3\View\Component\Area;
use LaravelC3\View\Component\AreaSpline;
use LaravelC3\View\Component\AreaStep;
use LaravelC3\View\Component\Bar;
use LaravelC3\View\Component\Chart;
use LaravelC3\View\Component\Donut;
use LaravelC3\View\Component\Gauge;
use LaravelC3\View\Component\Line;
use LaravelC3\View\Component\Pie;
use LaravelC3\View\Component\Scatter;
use LaravelC3\View\Component\Spline;
use LaravelC3\View\Component\Stanford;
use LaravelC3\View\Component\Step;

class LaravelC3ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $prefix = 'c3';
        $this->loadViewsFrom(__DIR__ . '/../resources/views', $prefix);
        $this->loadViewComponentsAs($prefix, $this->viewComponents());
    }

    private function viewComponents()
    {
        return [
            Area::class,
            AreaSpline::class,
            AreaStep::class,
            Bar::class,
            Chart::class,
            Donut::class,
            Gauge::class,
            Line::class,
            Pie::class,
            Scatter::class,
            Spline::class,
            Stanford::class,
            Step::class,
        ];
    }
}
