<?php

namespace Andreger\C3\Tests\Unit;

use Andreger\C3\Tests\TestCase;

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
