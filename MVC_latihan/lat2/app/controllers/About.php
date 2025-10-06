<?php

class About extends Controller
{
    public function index()
    {
        $data['title'] = "Index";
        
        $this->view('templates/header', $data);
        $this->view('About/index');
        $this->view('templates/footer');
    }
    
    public function aboutme($name, $major, $age) {
        $data['title'] = "About Me";
        $data['name'] = $name;
        $data['major'] = $major;
        $data['age'] = $age;

        $this->view('templates/header', $data);
        $this->view('about/aboutme', $data);
        $this->view('templates/footer');
    }
}
