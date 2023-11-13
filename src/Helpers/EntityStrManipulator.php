<?php 

namespace pmarco\EntitiesManager\Helpers;

use Illuminate\Support\Str;

class EntityStrManipulator
{
    public function formatPluralStr($string)
    {
        return Str::plural($string);
    }
    
    public function formatSingularStr($string)
    {
        return Str::singular($string);
    }

    public function formatUppercaseStr($string)
    {
        return Str::ucfirst($string);
    }

    public function formatPluralAndUppercaseStr($string)
    {
        return $this->formatUppercaseStr($this->formatPluralStr($string));
    }

    public function formatSingularAndUppercaseStr($string)
    {
        return $this->formatUppercaseStr($this->formatSingularStr($string));
    }
}