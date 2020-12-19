<?php 
require_once 'helpers.php';
session_start();
$products = get_products('../data/products.json');

$id = intval($_POST['id']);
$name = htmlspecialchars($_POST['product_name']);
$price = intval($_POST['price']);
$description = htmlspecialchars($_POST['description']);
$current_image = htmlspecialchars($_POST['current_image']);

$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$img_tmpname = $_FILES['image']['tmp_name'];

$img_type = pathinfo($img_name, PATHINFO_EXTENSION);

$is_img = false;
$has_details = false;

$updated_product = $products[$id];
$updated_product->price = $price;
$updated_product->name = $name;
$updated_product->description = $description;

if(strlen($name) > 0 && $price >0 &&strlen($description) > 0){
	$has_details = true;
}

if($_FILES && $_FILES['image']['error'] == 0){
	if($img_type =="jpg" || $img_type =="png" || $img_type == "jpeg" || $img_type == "svg" || $img_type=="gif") {
	$is_img = true;
 } else {
 	echo "Please upload an image file";
 }

 if($img_size > 0 && $is_img){
 	move_uploaded_file($img_tmpname, '../assets/img'.$img_name);
 }
 $updated_product->image = "/assets/img".$img_name;
}else {
	$updated_product->image = $current_image;
}

if($has_details ) {
	$products[$id] = $updated_product;
	file_put_contents('../data/products.json', json_encode($products,JSON_PRETTY_PRINT));
	$_SESSION['class'] = "primary";
	$_SESSION['message'] = "Product was edited successfully";
	header('Location: '.$_SERVER['HTTP_REFERER']);
}

 ?>