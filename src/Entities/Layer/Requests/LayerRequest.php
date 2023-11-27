<?php 

namespace pmarco\EntitiesManager\Entities\Layer\Requests;

use pmarco\EntitiesManager\Entities\Entity\Abstracts\Entity;
use pmarco\EntitiesManager\Entities\Layer\Abstracts\Layer;
use pmarco\EntitiesManager\Entities\Shared\Helpers\StrManipulator;


class LayerRequest extends Layer 
{
    public string $name = "Request";
    public $method = "artisan";

    public function __construct(Entity $entity, StrManipulator $strManipulator)
    {
        parent::__construct($entity, $strManipulator, $this->method, $this->template);
    }

}
