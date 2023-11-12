<?php 

namespace pmarco\EntitiesManager\Helpers;

use Illuminate\Support\Str;

class EntityStringManipulator
{
    protected function formatPluralStr($string)
    {
        return Str::plural($string);
    }
    
    protected function formatSingularStr($string)
    {
        return Str::singular($string);
    }

    protected function formatUppercaseStr($string)
    {
        return Str::ucfirst($string);
    }

    protected function formatPluralAndUppercaseStr($string)
    {
        return $this->formatUppercaseStr($this->formatPluralStr($string));
    }

    protected function formatSingularAndUppercaseStr($string)
    {
        return $this->formatUppercaseStr($this->formatSingularStr($string));
    }
}