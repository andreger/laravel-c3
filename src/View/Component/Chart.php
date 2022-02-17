<?php

namespace LaravelC3\View\Component;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class Chart extends Component
{
    public $id;

    public $type;

    public $dataColumns;

    public $dataX;

    public function __construct(string $id = null, array $dataColumns = null, string $dataX = null)
    {
        if ($id === null) {
            $this->id = 'x-c3-' . Str::random(10);
        }
        else {
            $this->id = Str::slug($id);
        }

        $this->dataColumns = $dataColumns;
        $this->dataX = $dataX;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $dataTypeAttr = $this->type ? "data-type='{$this->type}'" : null;
        $dataXAttr = $this->dataX ? "data-x='{$this->dataX}'" : null;

        return view('c3::chart', [
            'dataTypeAttr' => $dataTypeAttr,
            'dataXAttr' => $dataXAttr,
        ]);
    }
}
