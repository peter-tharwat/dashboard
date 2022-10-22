<?php

namespace App\Units;
use Nwidart\Modules\Facades\Module;

class ModulesUnit
{
    public function isModuleInstalled($module_name)
    {
        $plugin = Module::findorFail($module_name);
        return $plugin->isEnabled();

    }
    public function ShareDataModules($function_name, $arguments = null) {

        $modules = Module::toCollection()->toArray();

        $installed_modules = [];
        foreach ($modules as $module => $details) {
            if ($this->isModuleInstalled($details['name'])) {
                $installed_modules[] = $details;
            }
        }
        $data = [];
        if (!empty($installed_modules)) {
            foreach ($installed_modules as $module) {
                $class = 'Modules\\' . $module['name'] . '\Http\Controllers\DataShareController';
                if (class_exists($class)) {
                    $class_object = new $class();
                    if (method_exists($class_object, $function_name)) {
                        if (!empty($arguments)) {
                            $data[$module['name']] = call_user_func([$class_object, $function_name], $arguments);
                        } else {
                            $data[$module['name']] = call_user_func([$class_object, $function_name]);
                        }
                    }
                }
            }
        }

        return $data;
    }
}
