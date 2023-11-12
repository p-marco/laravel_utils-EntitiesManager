<?php 

namespace pmarco\EntitiesManager\Base;

class EntityBase
{
    protected $entityName = "";

    protected $entityController = "";
    protected $entityModel= "";
    protected $entityProvider = "";
    protected $entityRepository = "";
    protected $entityComponents = [];

    protected $entityBaseFolder = "";

    public function __construct($entityName)
    {
        $this->entityName = $entityName;
    }

    public function setName($entityName)
    {
        $this->entityName = $entityName;
    }

    public function getName()
    {
        return $this->entityName;
    }



    protected function setEntityComponent($entityComponent)
    {
        if (isset($entityComponent)) {
            throw new \Exception("Il componente di tipo '{$entityComponent}' esiste già.");
        }
    
        $entityComponent = new EntityComponent($this->entityName, $entityComponent);
        
        return $entityComponent;
    }

    public function setEntityModel()
    {
        return $this->setEntityComponent('model');
    }
    public function setEntityController()
    {
        return $this->setEntityComponent('model');
    }
    public function setEntityView()
    {
        return $this->setEntityComponent('model');
    }
    
}