<?php 

namespace pmarco\EntitiesManager\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File; 

class EntityPathManager
{

    protected $exists;
    protected $isDir;
    protected $isEmptyDir;
    protected $isWritable;
    protected $isReadable;

    protected $entitiesRootDir;
    protected $entityDir;
    protected $entityComponentDir;

    protected function checkPath(string $path) 
    {
        $this->exists       = File::exists($path);
        $this->isDir        = File::isDirectory($path);
        $this->isEmptyDir   = File::isEmptyDirectory($path);
        $this->isWritable   = File::isWritable($path);
        $this->isReadable   = File::isReadable($path);
    }

    public function managePath($path) 
    {
        $this->checkPath($path);
        if (!$this->exists || !$this->isDir) {
            $this->createDirectory($path);
        }
    }

    protected function createDirectory($path) 
    {
        File::makeDirectory($path, 0755, true);
    }

    protected function getEntityTreeDir($entity, $component) 
    {
        $this->entitiesRootDir      = config('entities_manager.entities-root_path');
        $this->entityDir            = "{$this->entitiesRootDir}/{$entity}";
        $this->entityComponentDir   = "{$this->entityDir}/{$component}";
    }

    public function manageDirectory($entity, $component) 
    {
        $this->getEntityTreeDir($entity, $component);
        $this->managePath($this->entitiesRootDir);
        $this->managePath($this->entityDir);
        $this->managePath($this->entityComponentDir);
    }

    public function generateFile($path, $content)
    {
        File::put($path, $content);
    }

}
