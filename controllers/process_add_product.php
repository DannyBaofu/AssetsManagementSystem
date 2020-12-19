<?php 
require_once 'helpers.php';
$products = get_products('../data/products.json');

//sanitize the inputs
$product_name = htmlspecialchars($_POST['product_name']);
$price = htmlspecialchars($_POST['price']);
$description = htmlspecialchars($_POST['description']);

//get all image properties and store it as variables.
$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$img_tmpname = $_FILES['image']['tmp_name'];


//pathinfo() is a method that returns information about a file path
$img_type = pathinfo($img_name, PATHINFO_EXTENSION); //jpg , svg ,png ,gif ,jpeg
$is_img = false;
$has_details = false;


if($img_type =="jpg" || $img_type =="png" || $img_type == "jpeg" || $img_type == "svg" || $img_type=="gif") {
	$is_img = true;
 } else {
 	echo "Please upload an image file";
 }
if(strlen($product_name) > 0 && intval($price) > 0 && strlen($description) > 0) {
	$has_details = true;
}
if($has_details && $is_img && $img_size > 0) {
	$product = new stdClass();
	$product->name = $product_name;
	$product->price = $price;
	$product->description = $description;
	$product->image = "/assets/img/".$img_name;
	$product->isActive = true;

	move_uploaded_file($img_tmpname, '../assets/img/'.$img_name);

	$products[] = $product;

	file_put_contents('../data/products.json',json_encode($products,JSON_PRETTY_PRINT));

	$_SESSION['message'] = "Product was succefully added";
	$_SESSION['class'] = "success";

	header('Location: /');
}	


?>