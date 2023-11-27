<?php 
namespace pmarco\EntitiesManager\Shared\Traits;

use pmarco\EntitiesManager\Shared\Helpers\PathManager; 

trait PathTrait 
{
    protected string $path;

    protected function setPath(string $path) 
    {
        $this->path = $path;
    }

    public function getPath(): string 
    {
        return PathManager::getEntityLayerDir($this->path);  
    }

}