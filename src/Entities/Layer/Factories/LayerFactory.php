<?php 

namespace pmarco\EntitiesManager\Entities\Layer\Factories;

use pmarco\EntitiesManager\Entities\Entity\Abstracts\Entity;
use pmarco\EntitiesManager\Entities\Layer\Abstracts\Layer;
use pmarco\EntitiesManager\Entities\Shared\Helpers\StrManipulator;


class LayerFactory extends Layer 
{
    public string $name = "factory";
    public string $layer = "factory";

    public $method = 'custom';
    public $template = __DIR__ . '/LayerFactory.template';

    public function __construct(Entity $entity, StrManipulator $strManipulator)
    {
        parent::__construct($entity, $strManipulator, $this->method, $this->template);
    }
}
