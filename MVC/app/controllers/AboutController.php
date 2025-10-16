<?php

class AboutController extends Controller {
    public function index($name = "Pian", $job = "Cyber Security", $age = 16) {
        $data['title'] = 'About';
        $data['name'] = $name;
        $data['job'] = $job;
        $data['age'] = $age;
        
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}