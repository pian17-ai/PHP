<?php

class Student extends Controller {
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

    public function insert() {
        if ($this->model('StudentModel')->insert($_POST) > 0) {
            Flasher::setFlash("Success", "Added", "success");
            header('Location: ' . BASEURL . '/Student');
            exit;
        } else {
            Flasher::setFlash("Fail", "Added", "danger");
            header('Location: ' . BASEURL . '/Student');
        }
    }

    public function delete($id) {
        if ($this->model('StudentModel')->delete($id) > 0) {
            Flasher::setFlash("Success", "Delete", "success");
            header('Location: ' . BASEURL . '/Student');
            exit;
        } else {
            Flasher::setFlash("Fail", "Delete", "danger");
            header('Location: ' . BASEURL . '/Student');
        }
    }
}