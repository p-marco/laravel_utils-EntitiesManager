<?php 


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class EntitiesManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('entities-config', function () {
            return Config::get('entities_manager');
        });
    }
}
