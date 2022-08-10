<?php

spl_autoload_register(function ($class_name){
    $file = __DIR__.'/'.str_replace('\\','/',$class_name).'.php';

    if(!file_exists($file)){
        throw new Exception("Class [{$class_name}] dose not exist in [{$file}] path");
    }
    require_once $file;
});

use Classes\Currency;
use Classes\Money;

try {
    $cur = new Currency('EUR');
    $money = new Money(100.0,new Currency('EUR'));
    $money2 = new Money(50.1,new Currency('EUR'));

    echo $cur->getIsCode();
    echo '<br>';
    echo '<hr>';
    var_dump($cur->equals('EUR','EUR'));
    echo '<br>';
    echo '<hr>';
    print_r($money->equals(new Money(100.0,new Currency('EUR')),new Money(50.1,new Currency('EUR'))));
    echo '<br>';
    echo '<hr>';
    print_r($money->add(new Money(100.0,new Currency('EUR')),new Money(50.1,new Currency('EUR'))));

}catch (InvalidArgumentException  $e){
    echo "Error message: {$e->getMessage()}";
}