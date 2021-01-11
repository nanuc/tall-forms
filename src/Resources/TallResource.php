<?php

namespace Tanthammar\TallForms\Resources;

use Tanthammar\TallForms\Input;

abstract class TallResource
{
    public static function make()
    {
        return new static;
    }

    public static function asForm($fields = null)
    {
        return static::make()->getAsForm($fields);
    }

    public static function asTable($fields = null)
    {
        return static::make()->getAsTable($fields);
    }

    public function getAsForm($fields = null)
    {
        return array_map(function($field) {
            return $field->toFormField();
        }, $this->getIncludedFields($fields));
    }

    public function getAsTable($fields = null)
    {
        return array_map(function($field) {
            return $field->toTableColumn();
        }, $this->getIncludedFields($fields));
    }

    protected function getIncludedFields($fields)
    {
        if($fields) {
            // I guess that can be done much cleaner, but that was the quickest to develop...
            $includedFields = [];
            $temp = collect($this->fields())->mapWithKeys(fn($field) => [ $field->name => $field]);
            foreach($fields as $field) {
                $includedFields[] = $temp[$field];
            }
            return $includedFields;
        }

        return $this->fields();
    }

    protected abstract function fields();
}
