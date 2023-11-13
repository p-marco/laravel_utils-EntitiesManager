<?php 
namespace pmarco\EntitiesManager\Factories;

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
            default:
                throw new \InvalidArgumentException("Invalid component type: $componentType");
        }
    }
}
