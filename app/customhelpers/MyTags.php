<?php

use Phalcon\Tag;

class MyTags extends Tag
{
    static  public function round($number)
    {
        return round($number);
    }
}