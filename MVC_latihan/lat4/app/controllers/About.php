<?php

class About extends Controller {
    public function index() {
        $data['title'] = "index";
        $this->view('templates/header');
        $this->view('About/index', $data);
        $this->view('templates/footer');
    }
    
    public function aboutme() {
        $data['title'] = "aboutme";
        $this->view('templates/header');
        $this->view('About/aboutme', $data);
        $this->view('templates/footer');
    }
}