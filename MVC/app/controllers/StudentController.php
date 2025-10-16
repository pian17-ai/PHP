<?php

class StudentController extends Controller {
    public function index () {
        $data['title'] = 'Students';
        $data['students'] = $this->model('StudentModel')->getAllStudents();

        $this->view('templates/header', $data);
        $this->view('student/index', $data);
        $this->view('templates/footer');
    }
}