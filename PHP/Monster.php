<?php
/**
 * Created by PhpStorm.
 * User: 1253250
 * Date: 03/11/2015
 * Time: 10:59
 */
namespace Atelier;
class Monster extends CClass
{
    function __construct()
    {
        $this->Hp = rand(5,10);
        $this->Attack = rand(5,8);
        $this->Defense = rand(3,6);
    }
}