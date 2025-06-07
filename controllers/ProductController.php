<?php
require_once 'models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function list() {
        $products = $this->productModel->getAll();
        include 'views/product/list.php';
    }

    public function create() {
        include 'views/product/create.php';
    }

    public function store() {
        $this->productModel->create($_POST);
        header('Location: index.php?route=product/list');
    }

    public function editStatus() {
        $product = $this->productModel->getById($_GET['id']);
        include 'views/product/edit_status.php';
    }

    public function updateStatus() {
        $this->productModel->updateStatus($_POST['id'], $_POST['status']);
        header('Location: index.php?route=product/list');
    }
}
