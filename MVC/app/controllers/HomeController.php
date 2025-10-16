<?php

class HomeController extends Controller{
    public function index () {
        $data['title'] = 'Home';
        $data['name'] = 'Pian';
        
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}