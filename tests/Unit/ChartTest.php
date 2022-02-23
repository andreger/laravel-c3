<?php

namespace LaravelC3\Tests\Unit;

use LaravelC3\Tests\TestCase;

class ChartTest extends TestCase
{
    /** @test */
    public function render_class()
    {
        $view = $this->blade(
            '<x-c3-chart />',
        );

        $view->assertSeeInOrder(['class', 'x-c3'], false);
    }
}
