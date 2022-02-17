<?php

namespace LaravelC3\View\Component;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class Chart extends Component
{
    public $id;

    public $type;

    public $dataColumns;

    public function __construct(string $id = null, $dataColumns = null)
    {
        if ($id === null) {
            $this->id = 'x-c3-' . Str::random(10);
        }
        else {
            $this->id = Str::slug($id);
        }

        $this->dataColumns = $dataColumns;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $typeAttr = $this->type ? "data-type='{$this->type}'" : null;

        return view('c3::chart', [
            'typeAttr' => $typeAttr,
        ]);
    }
}
