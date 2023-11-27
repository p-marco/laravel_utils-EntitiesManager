<?php 

namespace pmarco\EntitiesManager\Entities\Shared\Helpers;

use Illuminate\Support\Str;

class StrManipulator
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

    public function formatLowercaseStr($string)
    {
        return Str::lower($string);
    }

    public function formatPluralAndUppercaseStr($string)
    {
        return $this->formatUppercaseStr($this->formatPluralStr($string));
    }

    public function formatSingularAndUppercaseStr($string)
    {
        return $this->formatUppercaseStr($this->formatSingularStr($string));
    }

    public function formatSingularAndLowercaseStr($string)
    {
        return $this->formatLowercaseStr($this->formatSingularStr($string));
    }
}