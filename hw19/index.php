<?php

namespace Classes;

spl_autoload_register(function ($class_name){
    $file = __DIR__.'/'.str_replace('\\','/',$class_name).'.php';

    if(!file_exists($file)){
        throw new Exception("Class [{$class_name}] dose not exist in [{$file}] path");
    }
    require_once $file;
});


class BuildTechOptions
{
    public static function render(chooseBrand $brand, $deliveryType = 'lg')
    {

        $object = call_user_func([$brand, $deliveryType]);
        call_user_func([$object, "chooseBrand"]);
    }
}

BuildTechOptions::render(new LedTv());
echo '<hr>';
BuildTechOptions::render(new LcdTv(),'sony');
echo '<hr>';

?>
