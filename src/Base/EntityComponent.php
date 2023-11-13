<?php 
namespace pmarco\EntitiesManager\Base;

use pmarco\EntitiesManager\Helpers\EntityStrManipulator; 
use pmarco\EntitiesManager\Helpers\EntityPathManager; 


abstract class EntityComponent 
{

    protected string $name;
    protected Entity $entity;


    protected string $class;
    protected string $dir;
    protected string $template;
    protected string $fullPath;

    public function __construct(Entity $entity, EntityPathManager $managePath, EntityStrManipulator $manipulateStr)
    {
        $this->entity = $entity;
        $this->managePath = $managePath;
        $this->manipulateStr = $manipulateStr;

    }

    public function setEntityComponentProperties(string $component, Entity $entity) : void
    {
        $entityName = $this->manipulateStr->formatSingularAndLowercaseStr($component);
        $class = $this->manipulateStr->formatSingularAndUppercaseStr($component);
        $dir = $this->manipulateStr->formatPluralAndUppercaseStr($component);
        $fullPath = $this->getEntityTreeDir->entityComponentDir;
    }

    public function generateComponent($entityName, string $fullPath) : void
    {
        $this->call("make:$component", [
            'name' => $fullPath
        ]);
    }

    public function generate(string $entityName): void
    {
        $this->setEntityComponentProperties($this->name, $entityName);
        $fullPath = $this->getFullPath($entityName, $this->name);
        $this->generateComponent($entityName, $fullPath);
    }

}