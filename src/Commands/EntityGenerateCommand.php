<?php 

namespace pmarco\EntitiesManager\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

use pmarco\EntitiesManager\Base\Entity; 
use pmarco\EntitiesManager\Base\EntityComponent; 

use pmarco\EntitiesManager\Factories\EntityComponentFactory;

use pmarco\EntitiesManager\Helpers\EntityPathManager; 
use pmarco\EntitiesManager\Helpers\EntityStrManipulator; 

class EntityGenerateCommand extends Command
{

    protected $signature = 'entity:generate 
                            {entity : The name of the Entity you want to create} 
                            {--component= : The type of component you want to create (Model, View, Controller, Repository etc.)}';
    

    public function __construct(Entity $entity)
    {
        parent::__construct();
        $this->entity = $entity;
    }

    public function handle()
    {
        $entityName = $this->argument('entity');
        $types = $this->option('component');

        $validTypes = ['model', 'controller', 'view']; 

        $typesToGenerate = $types ? explode(',', $types) : $validTypes;

        foreach ($typesToGenerate as $type) {
            if (in_array($type, $validTypes)) {
                $component = EntityComponentFactory::create($type);
                $component->generate($type);
            } else {
                $this->error("Invalid type: $type");
            }
        }

        $this->info("Entity components generated for: $entityName");
    }
}
