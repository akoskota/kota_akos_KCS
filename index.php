<?php
require_once 'controllers/ProductController.php';

$controller = new ProductController();

$route = $_GET['route'] ?? 'product/list';

switch ($route) {
    case 'product/create':
        $controller->create();
        break;
    case 'product/store':
        $controller->store();
        break;
    case 'product/editStatus':
        $controller->editStatus();
        break;
    case 'product/updateStatus':
        $controller->updateStatus();
        break;
    case 'product/list':
    default:
        $controller->list();
        break;
}
