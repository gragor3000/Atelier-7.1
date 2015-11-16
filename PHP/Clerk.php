<?php
/**
 * Created by PhpStorm.
 * User: 1253250
 * Date: 03/11/2015
 * Time: 10:19
 */
namespace Atelier;
Class Clerk extends CClass
{
    function __construct()
    {
        $this->Hp = 8;
        $this->Attack = 9;
        $this->Defense = 3;
        $this->Gold = 0;
        $this->Special = false;
    }

    public function Reset()//remet les stats à celles du départs
    {
        $this->Hp = 8;
        $this->Attack = 9;
        $this->Defense = 3;
        $this->Special = false;
    }
}