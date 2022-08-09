<?php

require_once 'Classes/Currency.php';
require_once 'Classes/Money.php';

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