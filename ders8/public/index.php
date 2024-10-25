<?php

//class Person {
//    public $name;
//    public $age;
//
//    public function __construct($name, $age){
//        $this->name = $name;
//        $this->age = $age;
//    }
//
//    public function sayHello(){
//        return $this->name . " hello";
//    }
//}
//
//
//$person1 = new Person("John", "20");


//abstract class Animal {
//    abstract public function makeSound();
//
//    abstract public function runningSpeed();
//
//    public function sleep(){
//        echo "I'm sleeping\n" . "<br>";
//    }
//}
//
//class Dog extends Animal {
//    public function makeSound(){
//        echo "How How" . "<br>";
//    }
//
//    public function runningSpeed(){
//        echo "120" . "<br>";
//    }
//}
//
//class Cat extends Animal {
//    public function makeSound(){
//        echo "Miav Miav" . "<br>";
//    }
//
//    public function runningSpeed(){
//        echo "50" . "<br>";
//    }
//}
//
//$dog1 = new Dog();
//
//$dog1->makeSound();
//$dog1->sleep();
//$dog1->runningSpeed();
//
//$cat1 = new Cat();
//$cat1->makeSound();
//$cat1->sleep();
//$cat1->runningSpeed();

trait CoffeeTrait
{
    public function makeCoffee() {
        echo  "This class make coffee";
    }
}

trait CoupuchinoTrait
{
    public function makeCopuchino() {
        echo " This class make Copuchino";
    }
}

trait LatteTrait
{
    public function makeLatte() {
        echo " This class make Latte";
    }
}


class MakeCoffee {
    use CoffeeTrait;
}
class MakeCopuchino {
    use CoffeeTrait, CoupuchinoTrait;
}

class MakeLatte  {
    use CoffeeTrait, LatteTrait;
}

class AllInOneCoffee  {
    use CoffeeTrait, LatteTrait, CoupuchinoTrait;
}
