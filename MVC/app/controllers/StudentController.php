<?php

class StudentController extends Controller {
    public function index () {
        $data['title'] = 'Students';
        $data['students'] = $this->model('StudentModel')->getAllStudents();

        $this->view('templates/header', $data);
        $this->view('student/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['title'] = "Student Information";
        $data['student'] = $this->model('StudentModel')->getStudentById($id);

        $this->view('templates/header', $data);
        $this->view('student/detail', $data);
        $this->view('templates/footer');
    }
}