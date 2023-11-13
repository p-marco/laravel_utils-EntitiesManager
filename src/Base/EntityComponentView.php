<?php 
namespace pmarco\EntitiesManager\Base;

use pmarco\EntitiesManager\Helpers\EntityStrManipulator; 
use pmarco\EntitiesManager\Base\EntityComponent; 


class EntityComponentView extends EntityComponent
{
    public string $name = "view";

    public function generateComponent()
    {
        $this->info('Not yet supported; SORRY');
    }
}