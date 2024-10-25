<?php

namespace App;

//use DateTime;

// Class "App\DateTime"

use DateTime;

class Car
{
    public $model;

    public $dateTime;

    public $personData;

    public function getDay(){
        $this->dateTime = new DateTime();
        return $this->dateTime;
    }

    public function getPersonData()
    {
        $this->personData = new Person();
        return $this->personData;
    }
}