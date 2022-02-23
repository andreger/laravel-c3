<?php

namespace LaravelC3\Tests\Unit;

use LaravelC3\Tests\TestCase;

class LineTest extends TestCase
{
    /** @test */
    public function render_minimal_component()
    {
        $view = $this->blade(
            '<x-c3-line />',
        );

        $view->assertSeeInOrder(['data-config', 'line'], false);
    }
}
