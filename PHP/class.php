<?php
/**
 * Created by PhpStorm.
 * User: 1253250
 * Date: 03/11/2015
 * Time: 10:05
 */
namespace Atelier;
Class CClass
{
    protected $Hp;
    protected $Attack;
    protected $Defence;

    public function __get($get)
    {
         return $this->$get;
    }
    public function __set($set,$value)
    {
        $this->$set = $value;
    }





}

