<?php

namespace Classes;

use InvalidArgumentException ;

class Money
{
    private int|float $amount;
    protected Currency $currency;

    public function __construct(int|float $amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    public function setAmount(int|float  $amount):void
    {
        $this->amount = $amount;
    }
    public function setCurrency(Currency $currency):void
    {
        $this->currency = $currency;
    }

    public function getAmount(): float|int
    {
        return $this->amount;
    }

    public function getCurrency():object
    {
        return $this->currency;
    }

    public function equals(object $a, object $b):string
    {
        $result['amount'] = "Amount {$b->amount} is greater";
        if($a->amount>$b->amount){
            $result['amount'] = "Amount {$a->amount} is greater than or equal to Amount {$b->amount}";
        }
        $result['currency'] = 'Currencies are different';
        if($a->currency == $b->currency){
            $result['currency'] = 'The currencies are identical';
        }
        return "Comparison result: {$result['amount']}, {$result['currency']}";
    }

    public function add(object $a, object $b):float
    {
        if($a->currency != $b->currency){
             throw new InvalidArgumentException ('Currencies are different');
        }
        return $a->amount+$b->amount;
    }
}