<?php 

namespace pmarco\EntitiesManager\Base;

use pmarco\EntitiesManager\Helpers\EntityPathManager; 
use pmarco\EntitiesManager\Helpers\EntityStrManipulator; 

abstract class EntityComponent 
{
    protected string $name;
    protected Entity $entity;
    protected EntityPathManager $managePath;
    protected EntityStrManipulator $manipulateStr;
    protected string $fullPath;

    public function __construct(Entity $entity, EntityPathManager $managePath, EntityStrManipulator $manipulateStr)
    {
        $this->entity = $entity;
        $this->managePath = $managePath;
        $this->manipulateStr = $manipulateStr;
    }

    protected function setEntityComponentProperties(string $component)
    {
        $this->name = $this->manipulateStr->formatSingularAndUppercaseStr($component);
        $this->fullPath = $this->managePath->getEntityComponentDir($this->entity->getName(), $component);
    }

    protected function generateComponent($layerType, $entityName)
    {
        $fullCommandName = "{$this->fullPath}/{$entityName}{$this->name}";
        $this->info("Generating layer with Artisan command: make:$layerType Name: $fullCommandName");
        $this->call("make:$layerType", ['name' => $fullCommandName]);
    }
    
    public function generate(string $entityName, string $layerType)
    {
        $this->setEntityComponentProperties($layerType);
        $this->generateComponent($layerType, $entityName);
    }
}
