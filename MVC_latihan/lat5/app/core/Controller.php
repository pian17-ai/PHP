<?php

class Controller {
    public function view($url, $data=[]) {
        require_once '../app/views/' . $url . '.php';
    }
}