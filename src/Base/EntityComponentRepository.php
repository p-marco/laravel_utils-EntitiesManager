<?php 
namespace pmarco\EntitiesManager\Base;

use pmarco\EntitiesManager\Helpers\EntityStrManipulator; 
use pmarco\EntitiesManager\Base\EntityComponent; 


class EntityComponentRepository extends EntityComponent
{
    public string $name = "repository";

    public function generateComponent()
    {
        $this->info('Not yet supported; SORRY');
    }
}