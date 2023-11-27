<?php 
namespace pmarco\EntitiesManager\Shared\Traits;

use pmarco\EntitiesManager\Shared\Helpers\StrManipulator; 

trait NameTrait 
{
    protected string $name;

    protected function setName(string $name) 
    {
        $this->name = $name;
    }

    public function getName(): string 
    {
        return StrManipulator::formatSingularAndUppercaseStr($this->name);  
    }

}