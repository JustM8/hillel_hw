<?php

interface TaxiContract
{
    public function getCar();
}

class CheapTaxi implements TaxiContract
{

    public function carModel():string
    {
        return 'Lanos';
    }
    public function cost():string
    {
        return '50 hrn';
    }
    public function getCar()
    {
        echo "{$this->carModel()} - {$this->cost()}";
    }
}

class AverageTaxi implements TaxiContract
{

    public function carModel():string
    {
        return 'Mazda';
    }
    public function cost():string
    {
        return '100 hrn';
    }
    public function getCar()
    {
        echo "{$this->carModel()} - {$this->cost()}";
    }
}

class ExpensiveTaxi implements TaxiContract
{

    public function carModel():string
    {
        return 'Lexus';
    }
    public function cost():string
    {
        return '550 hrn';
    }
    public function getCar()
    {
        echo "{$this->carModel()} - {$this->cost()}";
    }
}

abstract class ATaxi implements TaxiContract
{
    abstract protected function callTaxi(): TaxiContract;

    public function getCar()
    {
        $taxi = $this->callTaxi();
        $taxi->getCar();
    }

}

class CheapTaxiApp extends ATaxi
{
    protected function callTaxi(): TaxiContract
    {
        return new CheapTaxi();
    }
}

class AverageTaxiApp extends ATaxi
{
    protected function callTaxi(): TaxiContract
    {
        return new AverageTaxi();
    }
}

class ExpensiveTaxiApp extends ATaxi
{
    protected function callTaxi(): TaxiContract
    {
        return new ExpensiveTaxi();
    }
}

function delivery(ATaxi $taxi)
{
    $taxi->getCar();
}

delivery(new CheapTaxiApp());
echo '<hr>';
delivery(new AverageTaxiApp());
echo '<hr>';
delivery(new ExpensiveTaxiApp());
echo '<hr>';