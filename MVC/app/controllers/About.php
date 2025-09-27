<?php

class About {
    public function index($name = "Pian", $job = "Software Engineer") {
        echo "Hello my name is $name, and I'm a $job";
    }

    public function page() {
        echo "About/page";
    }
}