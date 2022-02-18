<?php

namespace LaravelC3\View\Component;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Chart extends Component
{
    public $bindto;

    public $dataType;

    public function __construct(string $bindto = null, string $dataType = null)
    {
        if ($bindto === null) {
            $this->bindto = 'x-c3-' . Str::random(10);
        }
        else {
            $this->bindto = Str::slug($bindto);
        }
        $this->bindto = '#' . $this->bindto;

        if (! $this->dataType) {
            $this->dataType = $dataType;
        }
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return function($data) {
            $attributes = $data['attributes']->getAttributes();
            $attributes['bindto'] = $this->bindto;
            $attributes['dataType'] = $this->dataType;

            return view('c3::chart', [
                'id' => ltrim($this->bindto, '#'),
                'bindto' => $this->bindto,
                'config' => json_encode($this->getConfig($attributes), JSON_NUMERIC_CHECK)
            ])->render();
        };
    }

    private function getConfig(array $attributes)
    {
        $config = (object)[];

        foreach ($attributes as $key => $value) {
            $property = $this->splitAttribute($key);
            $config = $this->addProperty($config, $property, $value);
        }

        return $config;
    }

    private function addProperty(object $obj, array $property, $value)
    {
        if (count($property) == 1) {
            $obj->{$property[0]} = $value;
        }
        else {
            $first = array_shift($property);

            if (! isset($obj->$first)) {
                $obj->$first = new \stdClass();
            }

            $obj->$first = $this->addProperty($obj->$first, $property, $value);
        }

        return $obj;
    }

    private function splitAttribute(string $attribute)
    {
        if (empty($attribute)) {
            return $attribute;
        }

        $attribute = lcfirst($attribute);
        $attribute = preg_replace("/[A-Z]/", '_' . "$0", $attribute);
        $attribute = strtolower($attribute);

        $attribute = $this->repairCompositeNameAttribute($attribute);

        return explode('_', $attribute);
    }

    private function repairCompositeNameAttribute(string $attribute)
    {
        switch ($attribute) {
            case 'stanford_scale_format': return 'stanford_scaleFormat';
            case 'stanford_scale_max': return 'stanford_scaleMax';
            case 'stanford_scale_min': return 'stanford_scaleMin';
        }

        return $attribute;
    }
}
