<?php

namespace Andreger\C3;

use Illuminate\Support\ServiceProvider;
use Andreger\C3\View\Component\Area;
use Andreger\C3\View\Component\AreaSpline;
use Andreger\C3\View\Component\AreaStep;
use Andreger\C3\View\Component\Bar;
use Andreger\C3\View\Component\Chart;
use Andreger\C3\View\Component\Donut;
use Andreger\C3\View\Component\Gauge;
use Andreger\C3\View\Component\Line;
use Andreger\C3\View\Component\Pie;
use Andreger\C3\View\Component\Scatter;
use Andreger\C3\View\Component\Spline;
use Andreger\C3\View\Component\Stanford;
use Andreger\C3\View\Component\Step;

class C3ServiceProvider extends ServiceProvider
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
