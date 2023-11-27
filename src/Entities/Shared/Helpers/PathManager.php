<?php 
namespace pmarco\EntitiesManager\Shared\Helpers;
 
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File; 


class PathManager
{
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function get()
    {
    }
}