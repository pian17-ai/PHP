<?php

class About extends Controller {
    public function index() {
        $this->view('About/index');
    }

    public function aboutme() {
        $data['name'] = "Alvian Cahyo P";
        $data['major'] = "Computer Science";

        $this->view('About/aboutme', $data);
    }
}