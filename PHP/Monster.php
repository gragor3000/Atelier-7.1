<?php
/**
 * Created by PhpStorm.
 * User: 1253250
 * Date: 03/11/2015
 * Time: 10:59
 */
namespace Atelier;
class CMonster extends CClass
{
    function __Monster()
    {
        parent::$Hp = rand(5,10);
        parent::$Attack = rand(5,8);
        parent::$Defence = rand(3,6);
    }
}