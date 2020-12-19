<?php 
session_start();
require_once 'helpers.php';
$products = get_products('../data/products.json');
$id = $_GET['id'];

if($products[$id]->isActive) {
    $products[$id]->isActive = false;

}else {
    $products[$id]->isActive = true;
}

file_put_contents('../data/products.json',json_encode($products,JSON_PRETTY_PRINT));
//if true info then else warning
$_SESSION['class'] = $products[$id]->isActive ? "info" : "warning";
$_SESSION['message'] = $products[$id]->isActive ? "product activated" : "Product deactivated";
//if true product activated else deactivated

header('Location: '. $_SERVER['HTTP_REFERER']);

