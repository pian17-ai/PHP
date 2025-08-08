<?php

class Movie {
    public $title, $director, $studio, $duration;

    public function __construct($title, $director, $studio, $duration)
    {
        $this->title = $title;
        $this->director = $director;
        $this->studio = $studio;
        $this->duration = $duration;
    }
}

class PrintMovie {
    public function printer(Movie $movie) {
        return "Title : $movie->title, directed by $movie->director, produced by $movie->studio, duration : $movie->duration minutes";
    }
}



// $title, $director, $studio, $duration;
$movie1 = new Movie("Your Name", "Makoto Shinkai", "CoMix Wave Films", 106);
$movie2 = new Movie("Spirited Away", "Hayao Miyazaki", "Studio Ghibli", 125);
$movie3 = new Movie("A Silent Voice", "Naoko Yamada", "Kyoto Animation", 130);
$movie4 = new Movie("Jujutsu Kaisen 0", "Seong-Hu Park", "MAPPA", 105);
$movie5 = new Movie("Weathering with You", "Makoto Shinkai", "CoMix Wave Films", 112);

$print = new PrintMovie();
echo $print->printer($movie1); echo "<br>";
echo $print->printer($movie2); echo "<br>";
echo $print->printer($movie3); echo "<br>";
echo $print->printer($movie4); echo "<br>";
echo $print->printer($movie5); echo "<br>";