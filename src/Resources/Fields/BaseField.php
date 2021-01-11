<?php

namespace Tanthammar\TallForms\Resources\Fields;

use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Tanthammar\TallForms\Input;

abstract class BaseField
{
    public $label;
    public $name;
    public $key;

    protected $rules;
    public $filterable;

    public function __construct($label, $key = null)
    {
        $this->label = $label;
        $this->name = $key ?? Str::snake(Str::lower($label));
        $this->key = $key;
    }

    public static function make(string $label, string $key = null)
    {
        return new static($label, $key);
    }

    public function rules($rules): self
    {
        $this->rules = $rules;
        return $this;
    }

    public function filterable($options = null, $scopeFilter = null)
    {
        $this->filterable = $options ?? true;
        $this->scopeFilter = $scopeFilter;

        return $this;
    }

    public function toFormField()
    {
        return ($this->tallFormClass)::make($this->label, $this->key)
            ->rules($this->rules);
    }

    public function toTableColumn()
    {
        return ($this->tableClass)::name($this->name)
            ->filterable($this->filterable);
    }
}
