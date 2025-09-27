<?php

require_once '../app/helpers/vd.php';
class App {
    public function __construct()
    {
        $url = $this->parseURL();
        echo "I very love Jihan";
        vd($url);
    }

    public function parseURL () {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
        }
        return $url;
    }
}