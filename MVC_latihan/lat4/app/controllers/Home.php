<?php

class Home extends Controller {
    public function index() {
        $data['title'] = "index";
        $this->view('templates/header', $data);
        $this->view('Home/index', $data);
        $this->view('templates/footer', $data);
    }
}
