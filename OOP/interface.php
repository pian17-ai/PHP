<?php
include 'php.ini';

interface InfoProduct
{
    public function getInfoProduct();
}

class Product
{
    private $title, $writter, $publisher, $price;
    protected $discount = 0; // default 0

    public function __construct($title, $writter, $publisher, $price)
    {
        $this->title = $title;
        $this->writter = $writter;
        $this->publisher = $publisher;
        $this->price = $price;
    }

    // Getter & Setter -----------------------------

    public function getTitle()
    {
        return $this->title;
    }
    public function setNewTitle($newTitle)
    {
        $this->title = $newTitle;
    }

    public function getWritter()
    {
        return $this->writter;
    }
    public function setNewWritter($newWritter)
    {
        $this->writter = $newWritter;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }
    public function setNewPublisher($newPublisher)
    {
        $this->publisher = $newPublisher;
    }

    public function setNewPrice($newPrice)
    {
        $this->price = $newPrice;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
    public function getDiscount()
    {
        return $this->discount;
    }

    public function getPrice()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }

    // Utility methods -----------------------------

    public function getLabel()
    {
        return "{$this->writter}, {$this->publisher}";
    }

    public function getInfo()
    {
        return "$this->writter, $this->publisher";
    }

    public function getDetail()
    {
        return "{$this->title} | {$this->getLabel()} | Rp" . number_format($this->getPrice(), 0, ',', '.');
    }
}

class Komik extends Product implements InfoProduct
{
    public $page;

    public function __construct($title, $writter, $publisher, $price, $page)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->page = $page;
    }

    public function getInfoProduct()
    {
        return "Komik : " . parent::getDetail() . " - {$this->page} Halaman";
    }
}

class Anime extends Product implements InfoProduct
{
    public $time;

    public function __construct($title, $writter, $publisher, $price, $time)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->time = $time;
    }

    public function getInfoProduct()
    {
        return "Anime : " . parent::getDetail() . " - {$this->time} Menit";
    }
}

class Game extends Product implements InfoProduct
{
    public $playTime;

    public function __construct($title, $writter, $publisher, $price, $playTime)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->playTime = $playTime;
    }

    public function getInfoProduct()
    {
        return "Game : " . parent::getDetail() . " ~ {$this->playTime} Jam";
    }
}

// ----------------------
// TESTING
// ----------------------
$product1 = new Komik('Fumetsu no Anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 135);
$product2 = new Anime('Majo no Tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 180);

$product1->setDiscount(20); // diskon 20%

echo $product1->getInfoProduct();
echo "<br>";
echo $product2->getInfoProduct();
echo "<hr>";

$product1->setNewWritter("Piann");
echo "Penulis baru: " . $product1->getWritter();
