<?php

class About extends Controller {
    public function page($name = "Pian", $job = "Cyber Security", $age = 16) {
        $data['home'] = 'About';
        $data['name'] = $name;
        $data['job'] = $job;
        $data['age'] = $age;
        $this->view('templates/header', $data);
        $this->view('about/page', $data);
        $this->view('templates/footer');
    }
    
    public function index() {
        $data['title'] = "Index";
        $this->view('templates/header', $data);
        $this->view('about/index');
        $this->view('templates/footer');
    }
}