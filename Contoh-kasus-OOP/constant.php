<?php

include '../php.ini';

//kasus 1 (aduh aku yang ini bingung)
class Product {
    const PPN = 0.1;

    public static function PPN($price) {
        $result = $price + (self::PPN * $price );
        return $result;
    }
}

echo Product::PPN(10000);

//kasus 2
$status;

class User {
    public $username;
    private $password;

    const STATUS_ACTIVE = "active";
    const STATUS_INACTIVE = "inactive";
    const STATUS_BANNED = "banned";

    public function __construct($user, $pw)
    {
        $this->username = $user;
        $this->password = $pw;
        self::STATUS_ACTIVE;
    }
}

$acc1 = new User('Jihan', '1234');
echo $acc1::STATUS_ACTIVE;

//kasus 4

class MathConst {
    const PI = 3.14;

    public static function lingkaran($r) {
        $around = 2 * self::PI * $r;
        $wide = self::PI * $r * $r;

        return "Around : " . $around . ", wide : " . $wide;
    }
}

echo MathConst::lingkaran(10);