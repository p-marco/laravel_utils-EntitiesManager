<?php 

namespace pmarco\EntitiesManager\Entities\Layer\Views;

use pmarco\EntitiesManager\Entities\Entity\Abstracts\Entity;
use pmarco\EntitiesManager\Entities\Layer\Abstracts\Layer;
use pmarco\EntitiesManager\Entities\Shared\Helpers\StrManipulator;


class LayerView extends Layer 
{
    public string $name = "view";
    
    public $method = 'custom';
    public $template = __DIR__ . '/LayerView.template';

    public function __construct(Entity $entity, StrManipulator $strManipulator)
    {
        parent::__construct($entity, $strManipulator, $this->method, $this->template);
    }

}
