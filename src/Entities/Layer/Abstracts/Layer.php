<?php 

namespace pmarco\EntitiesManager\Entities\Layer\Abstracts;

use pmarco\EntitiesManager\Entities\Entity\Abstracts\Entity;
use pmarco\EntitiesManager\Entities\Shared\Helpers\StrManipulator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

abstract class Layer 
{
    protected string $name;
    protected $entity;
    protected $path;
    protected $namespace;
    protected $strManipulator;
    protected $method;
    protected $template;

    public function __construct(Entity $entity, StrManipulator $strManipulator, $method = null, $template = null)
    {
        $this->entity = $entity;
        $this->strManipulator = $strManipulator;
        $this->namespace = $this->determineNamespace();
        $this->method = $method;
        $this->template = $template;

        Log::info("method: $method");
        Log::info("template: $template");

    }

    public static function create(Entity $entity, $layer, $method = null, $template = null)
    {
        // Se $method o $template non sono specificati, li prendiamo dalla classe sottostante se esistono
        $layerInstance = new static($entity, resolve(StrManipulator::class));
        if ($method === null && property_exists($layerInstance, 'method')) {
            $method = $layerInstance->method;
        }
        if ($template === null && property_exists($layerInstance, 'template')) {
            $template = $layerInstance->template;
        }
    
        $layerInstance->method = $method;
        $layerInstance->template = $template;
        $layerInstance->generateLayer($layer);
    
        Log::info("Creating layer $layer for entity {$entity->getName()}");
    }
    

    protected function determineNamespace()
    {
        $rootDir = "App\\Entities\\";
        $entityNameFormatted = $this->strManipulator->formatSingularAndUppercaseStr($this->entity->getName());
        return "{$rootDir}{$entityNameFormatted}";
    }

    protected function generateLayer($layer)
    {
        if ($this->method == 'artisan') {
            $this->generateLayerWithArtisanCommand($layer);
        } elseif ($this->method == 'custom') {
            $this->generateLayerWithCustomMethod($layer);
        } else {
            throw new \InvalidArgumentException("Invalid generation method: $this->method");
        }
    }

    protected function generateLayerName($layer)
    {
        $entityNameFormatted = $this->strManipulator->formatSingularAndUppercaseStr($this->entity->getName());
        $layerDirectory = $this->strManipulator->formatPluralAndUppercaseStr($layer);
        $layerFileName = $this->strManipulator->formatSingularAndUppercaseStr($layer);
        return "{$layerDirectory}/{$entityNameFormatted}{$layerFileName}";
    }

    protected function generateLayerWithArtisanCommand($layer)
    {
        $layerName = $this->generateLayerName($layer);
        $commandString = "make:$layer";
        $parameters = ['name' => "{$this->namespace}\\{$layerName}"];
    
        Artisan::call($commandString, $parameters);
        Log::info("Layer $layer generated with Artisan command: $commandString");
    }

    protected function generateLayerWithCustomMethod($layer)
    {
        $layerName = $this->generateLayerNameCustom($layer);
        $templateContent = $this->getLayerTemplateContent();
        $layerContent = $this->createLayerContent($layerName, $templateContent);

        $layerClassPl = $this->getLayerClassPl($layer);
        $layerClass = $this->getLayerClass($layer);

        $trimmedNamespace = $this->getNamespacePath();
        Log::info("trimmed: $trimmedNamespace");
        $directoryPath = $this->getDirectoryPath();
        Log::info("dirpath: $directoryPath");

        $layerFilePath = $this->getLayerFilePath($layerClassPl, $layerName, $layerClass);


        if (!file_exists(dirname($layerFilePath))) {
            mkdir(dirname($layerFilePath), 0777, true);
        }

        file_put_contents($layerFilePath, $layerContent);
        Log::info("Custom layer created: $layerFilePath");
    }

    protected function getLayerClassPl($layer) : string
    {
        return $this->strManipulator->formatPluralAndUppercaseStr($this->name);
    }

    protected function getLayerClass($layer) : string
    {
        return $this->strManipulator->formatSingularAndUppercaseStr($this->name);
    }

    protected function generateLayerNameCustom($layer) : string
    {
        return $this->strManipulator->formatSingularAndUppercaseStr($this->entity->getName());
        
    }

    protected function createLayerContent($layerName, $templateContent)
    {
        // Calcola il namespace completo, includendo il tipo di layer
        $layerClassPl = $this->getLayerClassPl($layerName); // Assicurati che `$layerName` sia passato correttamente
        $fullNamespace = "{$this->namespace}\\{$layerClassPl}";
        $objClassName = "{$this->generateLayerNameCustom($layerName)}{$this->getLayerClass($layerName)}";
    
        // Sostituisce i placeholder nel template
        return str_replace(['{{namespace}}', '{{ClassName}}'], [$fullNamespace, $objClassName], $templateContent);
    }
    

    protected function getLayerTemplateContent()
    {
        if (!file_exists($this->template)) {
            throw new \Exception("Layer template file not found: {$this->template}");
        }
        return file_get_contents($this->template);
    }

    protected function getNamespacePath()
    {
        return ltrim($this->namespace, 'App\\');
    }

    protected function getDirectoryPath()
    {
        $namespacePath = $this->getNamespacePath();
        return str_replace('\\', '/', $namespacePath);
    }

    protected function getLayerFilePath($layerClassPl, $layerName, $layerClass)
    {
        $directoryPath = $this->getDirectoryPath();
        return app_path("{$directoryPath}/{$layerClassPl}/{$layerName}{$layerClass}.php");
    }


}