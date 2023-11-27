<?php 

namespace pmarco\EntitiesManager\Entities\Layer\Repositories;

use pmarco\EntitiesManager\Entities\Entity\Abstracts\Entity;
use pmarco\EntitiesManager\Entities\Layer\Abstracts\Layer;
use pmarco\EntitiesManager\Entities\Shared\Helpers\StrManipulator;


class LayerRepository extends Layer 
{
    public string $name = "Repository";
    public string $layer = "Repository";

    public $method = 'custom';
    public $template = __DIR__ . '/LayerRepository.template';

    public function __construct(Entity $entity, StrManipulator $strManipulator)
    {
        parent::__construct($entity, $strManipulator, $this->method, $this->template);
    }
}
