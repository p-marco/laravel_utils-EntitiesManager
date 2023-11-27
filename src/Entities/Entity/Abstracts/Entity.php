<?php 

namespace pmarco\EntitiesManager\Entities\Entity\Abstracts;

use pmarco\EntitiesManager\Entities\Layer\Abstracts\Layer;

use pmarco\EntitiesManager\Shared\Helpers\PathManager;

use pmarco\EntitiesManager\Entities\Layers\Factories\LayersFactory;

use Illuminate\Support\Facades\Log;

class Entity
{
    protected $name;
    protected $layers = [];
    protected $path;
    protected $namespace;

    public function __construct($name)
    {
        $this->name = $name;
        $this->path = $this->determinePath();
        $this->namespace = $this->determineNamespace();
    }

    public static function generate($name)
    {
        return new static($name);
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function layers($layers)
    {
        if (is_null($layers)) {
            $layers = $this->getDefaultLayers(); 
        } elseif (is_string($layers)) {
            $layers = [$layers]; 
        }

        foreach ($layers as $layer) {
            $this->createLayer($layer);
        }

        return $this; 
    }

    protected function getDefaultLayers()
    {
        // return ['model', 'controller'];
        return LayersFactory::getLayers();
    }

    protected function createLayer($layer)
    {
        LayersFactory::create($layer, $this);
        
    }

    protected function determinePath()
    {
    }

    protected function determineNamespace()
    {
    }
}