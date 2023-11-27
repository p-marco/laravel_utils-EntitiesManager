<?php 

namespace pmarco\EntitiesManager\Base;

use pmarco\EntitiesManager\Factories\EntityComponentFactory;
use pmarco\EntitiesManager\Helpers\EntityPathManager; 
use pmarco\EntitiesManager\Helpers\EntityStrManipulator; 

class Entity
{
    protected string $name;
    protected string $fullPath;
    protected EntityPathManager $managePath;
    protected EntityStrManipulator $manipulateStr;

    public function __construct(string $name, EntityPathManager $managePath, EntityStrManipulator $manipulateStr)
    {
        $this->name = $name;
        $this->managePath = $managePath;
        $this->manipulateStr = $manipulateStr;

        $this->initialize();
    }

    protected function initialize()
    {
        // Initialization logic
        $this->managePath->getEntityTreeDir($this->name);
        $this->fullPath = $this->managePath->getEntityComponentDir();
    }

    public function createLayer(string $layerType)
    {
        EntityComponentFactory::create($layerType, $this, $this->managePath, $this->manipulateStr);
        
    }

    public function describe()
    {
        return "Entity Details:\n" .
               "Name: " . $this->name . "\n" .
               "Full Path: " . $this->fullPath;
    }
}
