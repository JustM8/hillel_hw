<?php

namespace Classes;

use InvalidArgumentException ;

class Currency
{
    private string $isoCode;
    protected array $currency = array('AFN','EUR','ALL','DZD','USD');


    public function __construct(string $isoCode)
    {
        $this->setIsCode($isoCode);
    }

    public function setIsCode(string $isoCode):void
    {
        if (!in_array($isoCode, $this->currency)) {
            throw new InvalidArgumentException ('Incorrect currency format: '.$isoCode);
        }
        $this->isoCode = $isoCode;
    }

    public function getIsCode():string
    {
        return $this->isoCode;
    }

    public function equals(string $currencyA,string $currencyB):bool
    {
        return $currencyA==$currencyB;
    }
}
