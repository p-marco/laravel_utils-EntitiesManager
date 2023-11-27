<?php 

namespace pmarco\EntitiesManager;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

use pmarco\EntitiesManager\Entities\Shared\Helpers\EntityStrManipulator; 
use pmarco\EntitiesManager\Entities\Shared\Helpers\EntityPathManager; 

class EntitiesManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(EntityPathManager::class, function ($app) {
            return new EntityPathManager();
        });

        $this->app->singleton(EntityStrManipulator::class, function ($app) {
            return new EntityStrManipulator();
        });
    }
    public function boot()
    {
        define('PACKAGE_PATH', __DIR__);


        if ($this->app->runningInConsole()) {
            $this->commands([
                \pmarco\EntitiesManager\Commands\EntityGenerateCommand::class,
            ]);
        }

    }
}
