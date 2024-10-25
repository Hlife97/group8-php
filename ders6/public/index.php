<?php

// PascalCase

declare(strict_types=1);
//
//class Person {
//    public string $name;
//    public int $age;
//    private string $nationality;
//
//    protected float $height;
//
//    public function __construct(string $name, int $age, string $nationality, float $height){
//        $this->name = $name;
//        $this->age = $age;
//        $this->nationality = $nationality;
//        $this->height = $height;
//    }
//
//    public function plusAge(){
//        $this->age += 1;
//        return $this;
//    }
//
//    public function minusAge(){
//        $this->age -= 1;
//        return $this;
//    }
//
//    public function getNationality(): string
//    {
//        return $this->nationality;
//    }
//}
//
//
//class Teacher extends Person {
//    public function changeHeight(){
//        $this->height += 90;
//    }
//    public function getHeight(){
//        $this->changeHeight();
//        return $this->height;
//    }
//}
//
//
//
//$person1 = new Person("Kenan", 30, "Azerbaijan", 186);
//
//$person1
//    ->plusAge()
//    ->plusAge()
//    ->plusAge()
//    ->minusAge();
//
//var_dump($person1->age);
//
//$teacher1 = new Teacher("John", 22, "Azerbaijan", 179);
//
//
//echo "<pre>";
//print_r($teacher1->getHeight());
//echo "</pre>";

//$json = '{"a": 1, "b": 2, "c": 3, "d": 4, "e": 5}';;
//
//$obj = json_decode($json, true);
//var_dump($obj);
//var_dump($obj->a);
//$array = ['brand' => 'Toyota'];
//
//$obj = (object)$array;
//
//var_dump($obj);

include '../App/Car.php';
include '../foo/Car.php';
include '../App/Person.php';


//$car  = new Hello\Car();
//$car2 = new App\Car();
//
//var_dump($car);
//var_dump($car2->getDay());
//var_dump($car2->getPersonData());

include '../Frontend/Page.php';
include '../Backend/Page.php';

use Backend\Page as BackendPage;
use Frontend\Page as FrontendPage;

$page1 = new BackendPage();
$page2 = new FrontendPage();


var_dump($page1);
var_dump($page2);
















