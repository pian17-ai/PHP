<?php

//kasus 1
abstract class Hewan {
    private $gender;

    abstract function makeSound();
}

class Kitty extends Hewan {
    function makeSound()
    {
        return 'miaw';
    }
}

class Dog extends Hewan {
    function makeSound()
    {
        return 'Guk';
    }
}

//kasus 2
abstract class Vehicle {
    abstract function move();
}

class Car extends Vehicle {
    function move()
    {
        return 'Car use a road';
    }
}

class Motorcyle extends Vehicle {
    function move()
    {
        return 'Motorcyle use a road motorcylce';
    }
}

//kasus 3
abstract class Payment {
    abstract function pay();
}

class CreditCardPayment extends Payment {
    function pay()
    {
        return "Payment with Credit card";
    }
}

class QRIS extends Payment {
    function pay()
    {
        return "Payment with QRIS";
    }
}