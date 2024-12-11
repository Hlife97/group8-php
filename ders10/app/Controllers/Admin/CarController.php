<?php

namespace App\Controllers\Admin;

use App\Model\Car;
use Core\Helper;

class CarController
{
    public function index()
    {
        return Helper::getAdminViewFile('cars');
    }

    public function create()
    {
        if($_REQUEST == 'post'){
            $carname = $_REQUEST['carname'];
            $brand = $_REQUEST['brand'];

            Car::create([]);

            return "ok";

        }
    }
}