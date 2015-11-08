<?php
/**
 * Created by PhpStorm.
 * User: 1253250
 * Date: 03/11/2015
 * Time: 10:19
 */
namespace Atelier;
Class Warrior extends CClass
{
    function __construct()
    {
        $this->Hp = 10;
        $this->Attack = 10;
        $this->Defense= 4;
        $this->Special = true;
    }

    public function Reset()//remet les stats à celles du départs
    {
        $this->Hp = 10;
        $this->Attack = 10;
        $this->Defense= 4;
        $this->Special = true;
    }
}