<?php
/**
 * Created by PhpStorm.
 * User: smerth
 * Date: 2015-07-24
 * Time: 11:07
 */

namespace AppBundle\Service;



class Greeter
{
    public function __construct($greeting)
    {
        $this->greeting = $greeting;
    }

    public function greet($name)
    {
        return $this->greeting . ' ' . $name;
    }
}