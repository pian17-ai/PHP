<?php

class About extends Controller {
    public function index() {
        $this->view('About/index');
    }

    public function aboutme ($name, $job, $age) {
        $data['title'] = "About me - About";
        $data['name'] = $name;
        $data['job'] = $job;
        $data['age'] = $age;

        $this->view('About/aboutme', $data);
    }
}