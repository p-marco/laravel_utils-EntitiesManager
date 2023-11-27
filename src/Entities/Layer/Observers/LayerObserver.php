<?php 

namespace pmarco\EntitiesManager\Entities\Layer\Observers;

use pmarco\EntitiesManager\Entities\Entity\Abstracts\Entity;
use pmarco\EntitiesManager\Entities\Layer\Abstracts\Layer;
use pmarco\EntitiesManager\Entities\Shared\Helpers\StrManipulator;


class LayerObserver extends Layer 
{
    public string $name = "Observer";
    public $method = "artisan";

    public function __construct(Entity $entity, StrManipulator $strManipulator)
    {
        parent::__construct($entity, $strManipulator, $this->method, $this->template);
    }

}
