<?php
class Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed():int
    {
        return $this->red;
    }
    public function getGreen():int
    {
        return $this->green;
    }
    public function getBlue():int
    {
        return $this->blue;
    }

    private function setRed(int $red):void
    {
        if($red>=0 && $red<=255):
            $this->red = $red;
        else:
            throw new Exception('Out of range red');
        endif;
    }
    private function setGreen(int $green):void
    {
        if($green>=0 && $green<=255):
            $this->green = $green;
        else:
            throw new Exception('Out of range green');
        endif;
    }
    private function setBlue(int $blue):void
    {
        if($blue>=0 && $blue<=255):
            $this->blue = $blue;
        else:
            throw new Exception('Out of range blue');
        endif;
    }

    public function equals():bool
    {
        if($this->red  == $this->green && $this->green == $this->blue):
            return true;
        else:
            return false;
        endif;
    }

    public function mix(object $color):object
    {
        $color->red = intval(($this->red+$color->red)/2);
        $color->green =  intval(($this->green+$color->green)/2);
        $color->blue = intval(($this->blue+$color->blue)/2);

        return $color;
    }

    public static function random():object
    {
        $rgb = (object) array('red'=>mt_rand(0,255),'green'=>mt_rand(0,255),'blue'=>mt_rand(0,255));
        return $rgb;
    }
}

try {
    $color = new Color(200,200,200);
    echo 'Equals check: ';
    var_dump($color->equals()); //перевірка на рівність
    echo '<br> Static random: ';
    var_dump($color->random()); //рандомні значення кольорів

    echo '<br>';
    echo "Simple color: {$color->getRed()} {$color->getGreen()} {$color->getBlue()}";
    echo '<br>';

    $mixedColor = $color->mix(new Color(115, 100, 100));
    echo "Mixed: {$mixedColor->getRed()} {$mixedColor->getGreen()} {$mixedColor->getBlue()}";

}catch (Exception $exception){
    echo "Error message: {$exception->getMessage()}";
}

//$color = new Color(444,200,200);
//echo 'Equals check: ';
//var_dump($color->equals()); //перевірка на рівність
//echo '<br> Static random: ';
//var_dump($color->random()); //рандомні значення кольорів
//
//echo '<br>';
//    echo "Simple color: {$color->getRed()} {$color->getGreen()} {$color->getBlue()}";
//echo '<br>';
//
//$mixedColor = $color->mix(new Color(115, 100, 100));
//echo "Mixed: {$mixedColor->getRed()} {$mixedColor->getGreen()} {$mixedColor->getBlue()}";
