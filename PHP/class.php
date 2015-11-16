<?php
/**
 * Created by PhpStorm.
 * User: 1253250
 * Date: 03/11/2015
 * Time: 10:05
 */
namespace Atelier;
abstract Class CClass
{
    protected $Hp;
    protected $Attack;
    protected $Defense;
    protected $Special;
    protected $Gold;

    public function __get($get)
    {
        return $this->$get;
    }
    public function __set($set,$value)
    {
        $this->$set = $value;
    }

    protected abstract function Reset();
}

