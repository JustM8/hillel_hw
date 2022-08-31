<?php

namespace Classes;

class LcdTv implements chooseBrand
{

    public function sony(): Sony
    {
        return new Sony();
    }

    public function lg(): Lg
    {
        return new Lg();
    }
}