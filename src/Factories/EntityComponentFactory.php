<?php 
namespace pmarco\EntitiesManager\Factories;

use pmarco\EntitiesManager\Base\EntityComponent;
use pmarco\EntitiesManager\Base\EntityComponentModel;
use pmarco\EntitiesManager\Base\EntityComponentView;
use pmarco\EntitiesManager\Base\EntityComponentController;
use pmarco\EntitiesManager\Base\EntityComponentRepository;
use pmarco\EntitiesManager\Base\EntityComponentProvider;

class EntityComponentFactory
{
    public static function create(string $componentType): EntityComponent
    {
        switch ($componentType) {
            case 'model':
                return new EntityComponentModel();
            case 'view':
                return new EntityComponentView();
            case 'controller':
                return new EntityComponentController();
            case 'repository':
                return new EntityComponentRepository();
            case 'provider':
                return new EntityComponentProvider();
            default:
                throw new \InvalidArgumentException("Invalid component type: $componentType");
        }
    }
}
