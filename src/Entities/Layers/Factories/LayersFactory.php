<?php 
namespace pmarco\EntitiesManager\Entities\Layers\Factories;

use Illuminate\Container\Container;

use pmarco\EntitiesManager\Entities\Entity\Abstracts\Entity;
use pmarco\EntitiesManager\Entities\Layer\Abstracts\Layer;
use pmarco\EntitiesManager\Entities\Layer\Controllers\LayerController;
use pmarco\EntitiesManager\Entities\Layer\Models\LayerModel;
use pmarco\EntitiesManager\Entities\Layer\Views\LayerView;
use pmarco\EntitiesManager\Entities\Layer\Factories\LayerFactory;
use pmarco\EntitiesManager\Entities\Layer\Events\LayerEvent;
use pmarco\EntitiesManager\Entities\Layer\Providers\LayerProvider;
use pmarco\EntitiesManager\Entities\Layer\Repositories\LayerRepository;
use pmarco\EntitiesManager\Entities\Layer\Observers\LayerObserver;
use pmarco\EntitiesManager\Entities\Layer\Listeners\LayerListener;
use pmarco\EntitiesManager\Entities\Layer\Requests\LayerRequest;


use pmarco\EntitiesManager\Entities\Shared\Helpers\StrManipulator;


class LayersFactory
{
    public static function create($layerType, Entity $entity)
    {
        if (!in_array($layerType, self::getLayers())) {
            throw new \InvalidArgumentException("Invalid type: $layerType");
        }

        switch ($layerType) {
            case 'model':
                return LayerModel::create($entity, $layerType);
            case 'view':
                return LayerView::create($entity, $layerType);
            case 'controller':
                return LayerController::create($entity, $layerType);
            case 'factory':
                return LayerFactory::create($entity, $layerType);
            case 'event':
                return LayerEvent::create($entity, $layerType);
            case 'provider':
                return LayerProvider::create($entity, $layerType);
            case 'repository':
                return LayerRepository::create($entity, $layerType);
            case 'observer':
                return LayerObserver::create($entity, $layerType);
            case 'listener':
                return LayerListener::create($entity, $layerType);           
            case 'request':
                return LayerRequest::create($entity, $layerType);
        }
    }

    public static function getLayers()
    {
        return ['model', 'view', 'controller', 'factory', 'event', 'provider', 'repository', 'observer', 'listener', 'request'];
    }

    
}