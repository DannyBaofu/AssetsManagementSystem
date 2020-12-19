<?php  
require_once 'helpers.php';
session_start();
$id = $_GET['id'];
$products = get_products('../data/products.json');

array_splice($products, $id, 1);
file_put_contents('../data/products.json', json_encode($products, JSON_PRETTY_PRINT));

$_SESSION['class'] = "danger";
$_SESSION['message'] = "Product was successfully deleted";

header('Location: /');
?>