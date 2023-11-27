<?php 
namespace pmarco\EntitiesManager\Commands;

use Illuminate\Console\Command;
use pmarco\EntitiesManager\Entities\Entity\Abstracts\Entity;

class EntityGenerateCommand extends Command
{
    protected $signature = 'entity:generate 
                            {entity : The name of the Entity you want to create} 
                            {--layer= : The type of Layer you want to create (Model, View, Controller, etc.)}';
    
    protected $description = 'Generate an entity with specified layers.';

    public function handle()
    {

        $entityName = $this->argument('entity');
        $layers = $this->option('layer');

        Entity::generate($entityName)->layers($layers);

        $this->info("Entity $entityName with layers created successfully.");

    }
}
