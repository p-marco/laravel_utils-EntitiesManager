<?php 

namespace pmarco\EntitiesManager\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

use pmarco\EntitiesManager\Base\EntityBase; 

use pmarco\EntitiesManager\Helpers\EntityPathManager; 
use pmarco\EntitiesManager\Helpers\EntityStrManipulator; 

class EntityGenerateCommand extends Command
{

    protected $signature = 'entity:generate 
                            {entityName : The name of the Entity you want to create} 
                            {--entityComponent? : The type of component you want to create (Model, View, Controller, Repository etc.)}';
    

    public function __construct(EntityPathManager $entityPathManager, EntityBase $entity, EntityStrManipulator $entityStrManipulator)
    {
        parent::__construct();
        $this->entityBase = $entity;
        $this->entityPathManager = $entityPathManager;
        $this->entityStrManipulator = $entityStrManipulator;
    }

    public function handle()
    {
        $entityName = $this->argument('entityName');
        $entityComponent = $this->option('entityComponent');

        //$this->setCommandSignature($entityComponent);
        //$this->setCommandDescription();
        $this->setEntityComponentProperties($entityComponent);

        $this->entityPathManager->managePath($entityName, $entityComponent);

        $this->info("Generating entity: $entityName");
    }

    public function setEntityComponentProperties($entityComponent)
    {
        $this->entityComponentClass = $this->entityStrManipulator->formatSingularAndUppercaseStr($entityComponent);
        $this->entityComponentDir = $this->entityStrManipulator->formatPluralAndUppercaseStr($entityComponent);
    }

    protected function setCommandSignature($entityComponent)
    {
        $configuredCommandSignature = config('entities_manager.command_generate-signature');
        if (!empty($entityComponent)) {
            $this->signature = "$configuredCommandSignature:$entityComponent {entityName}";
        } else {
            $this->signature = "$configuredCommandSignature {entityName}";
        }
    }

    protected function setCommandDescription()
    {
        $this->description = config('entities_manager.command_generate-description');
    }


}
