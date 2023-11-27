<?php 

namespace pmarco\EntitiesManager\Entities\Entity\Facades;

use Illuminate\Support\Facades\Facade;

class Entity extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'entity'; 
    }

    public static function __callStatic($entityName, $arguments)
    {
        // Il primo argomento è ora il metodo da chiamare, es. 'generate' o 'delete'
        $methodName = array_shift($arguments);
        $entityClass = 'App\\Entities\\' . $entityName;



        $entityInstance = new $entityClass();

        return call_user_func_array([$entityInstance, $methodName], $arguments);
    }
}
