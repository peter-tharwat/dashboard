<?php
namespace App\Helpers;
use App\Models\Plugin;

class PluginsHelper {

    public $plugins;

    public static function __callStatic($name, $arguments) {
        $instance = new self();
        return $instance->$name(...$arguments);
    }

    public function getPlugin($plugin_slug=""){
        $this->plugins = collect($this->getAllPlugins());
        $plugin = collect($this->plugins)->where('slug',$plugin_slug)->first();
        if(isset($plugin) && $plugin['activated']==1)
            return $plugin;
        return null;
    }

    public function isActive($plugin_slug=""){
        $this->plugins = collect($this->getAllPlugins());
        $plugin = collect($this->plugins)->where('slug',$plugin_slug)->first();
        if(isset($plugin) && $plugin['activated']==1)
            return true;
        return false;
    }
    public function getAllPlugins(){
        $plugins = cache()->remember('plugins',60,function(){
            return \App\Models\Plugin::get();
        });
        return $plugins;
    }
    public function getValue($plugin_slug="",$key){
        if($this->isActive($plugin_slug)){
            return data_get($this->getPlugin($plugin_slug)['settings'],$key,null);
        }
        return null;
    }
}