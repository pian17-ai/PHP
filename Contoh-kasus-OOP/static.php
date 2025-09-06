<?php

// kasus 1
class User
{
    public $name;
    public static $count = 0;

    public function __construct($name)
    {
        $this->name = $name;
        self::$count += 1;
    }

    public static function getAllUser()
    {
        return self::$count;
    }
}

$user = new User('Jihan Syahbani');
$user1 = new User('Alvian Cahyo Pambudi');
$user2 = new User('Nahida');

echo User::getAllUser();

echo '<br>';

// kasus 2
class BankAccount
{
    public $name;
    private $balance;
    public static $interestRate = 10;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public static function setInterestRate($rate)
    {
        self::$interestRate = $rate;
    }

    public function getBalanceWithInterest()
    {
        return $this->balance + ($this->balance * self::$interestRate / 100);
    }
}

$bankacc1 = new BankAccount('Jihan', 100000);
echo $bankacc1->getBalanceWithInterest();

echo '<br>';

// kasus 3
class MathHelper
{
    public static function math($num1, $num2)
    {
        $plus = $num1 + $num2;
        $subtract = $num1 - $num2;
        $multiply = $num1 * $num2;
        $divide = $num1 / $num2;

        return "Plus Result : " . $plus . ", Subtract : " . $subtract . ", Multiply : " . $multiply . ", Divide : " . $divide;
    }
}

echo MathHelper::math(10, 5);

echo '<br>';

// kasus 4
class Logger
{
    public static $logs = [];

    public static function addLog($message)
    {
        self::$logs[] = date('Y-m-d H:i:s') . " - " . $message;
    }

    public static function getAllLog()
    {
        return self::$logs;
    }
}

Logger::addLog("Pian berangkat sekolah bersama Jihan");
Logger::addLog("Pian juara LKSN 2026");
Logger::addLog("Pian menyukseskan acara maulid SMKN64 sebagai ketua pelaksana");

foreach (Logger::getAllLog() as $log) {
    echo $log . PHP_EOL . "<br>";
}