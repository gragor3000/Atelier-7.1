<?php
/**
 * Created by PhpStorm.
 * User: 1253250
 * Date: 03/11/2015
 * Time: 10:19
 */
namespace Atelier;
include("class.php");
Class Mage extends CClass
{
    function __construct()
    {
        $this->Hp = 6;
        $this->Attack = 8;
        $this->Defense = 3;
    }
}