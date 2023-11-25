<?php 
namespace pmarco\EntitiesManager\Factories;

use pmarco\EntitiesManager\Base\Entity;

use pmarco\EntitiesManager\Base\EntityComponent;
use pmarco\EntitiesManager\Base\EntityComponentModel;
use pmarco\EntitiesManager\Base\EntityComponentView;
use pmarco\EntitiesManager\Base\EntityComponentController;
use pmarco\EntitiesManager\Base\EntityComponentRepository;
use pmarco\EntitiesManager\Base\EntityComponentProvider;

class EntityComponentFactory
{
    public static function create(string $componentType, Entity $entity, EntityPathManager $managePath, EntityStrManipulator $manipulateStr)
    {
        
        switch ($componentType) {
            case 'model':
                return new EntityComponentModel($entity, $managePath, $manipulateStr);            
            case 'view':
                return new EntityComponentView($entity, $managePath, $manipulateStr);
            case 'controller':
                return new EntityComponentController($entity, $managePath, $manipulateStr);
            case 'repository':
                return new EntityComponentRepository($entity, $managePath, $manipulateStr);
            case 'provider':
                return new EntityComponentProvider($entity, $managePath, $manipulateStr);
            default:
                throw new \InvalidArgumentException("Invalid component type: $componentType");
        }
    }
}
