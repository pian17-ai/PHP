<?php

class About {
    public function index() {
        echo "About/index";
    }

    public function aboutme ($name, $job, $age) {
        echo "Hellow I'm $name, now I work as a $job, and $age years old";
    }
}