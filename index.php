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
        if($red<0 || $red>255){
            throw new Exception('Out of range red');
        }else{
            $this->red = $red;
        }
    }
    private function setGreen(int $green):void
    {
        if($green<0 || $green>255){
            throw new Exception('Out of range green');
        }else{
            $this->green = $green;
        }
    }
    private function setBlue(int $blue):void
    {
        if($blue<0 || $blue>255){
            throw new Exception('Out of range blue');
        }else{
            $this->blue = $blue;
        }
    }

    public function equals():bool
    {
        return $this->red  == $this->green && $this->green == $this->blue;
    }

    public function mix(object $color):int
    {
        return intval(($color->red+$color->green+$color->blue)/3);
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

    $mixedColor = $color->mix(new Color(115, 255, 3));
    echo "Mixed: {$mixedColor}";

}catch (Exception $exception){
    echo "Error message: {$exception->getMessage()}";
}

