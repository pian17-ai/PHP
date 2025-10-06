<?php

class About extends Controller {
    public function index($name = "Pian", $job = "Cyber Security", $age = 16) {
        $data['home'] = 'About';
        $data['name'] = $name;
        $data['job'] = $job;
        $data['age'] = $age;
        $this->view('about/index', $data);
    }

    public function page() {
        $this->view('about/page');
    }
}