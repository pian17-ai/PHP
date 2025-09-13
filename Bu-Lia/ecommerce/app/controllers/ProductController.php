<?php
include_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $product;

    public function __construct($db) {
        $this->product = new Product($db);
    }

    public function index() {
        $products = $this->product->getAll();
        include __DIR__ . '/../views/products/index.php';
    }

    public function create() {
        include __DIR__ . '/../views/products/form.php';
    }

    public function store($data) {
        if ($this->product->insert($data)) {
            $success = "Berhasil Menambahkan Data";
        } else {
            $error = "Gagal Menambahkan Data";
        }
        include __DIR__ . '/../views/products/messages.php';
    }

    public function edit($id) {
        $product = $this->product->getById($id);
        include __DIR__ . '/../views/products/form.php';
    }

    public function update($data) {
        if ($this->product->update($data)) {
            $success = "Berhasil Mengupdate Data";
        } else {
            $error = "Gagal Mengupdate Data";
        }
        include __DIR__ . '/../views/products/messages.php';
    }

    public function delete($id) {
        if ($this->product->delete($id)) {
            $success = "Berhasil Menghapus Data";
        } else {
            $error = "Gagal Menghapus Data";
        }
        include __DIR__ . '/../views/products/messages.php';
    }
}
