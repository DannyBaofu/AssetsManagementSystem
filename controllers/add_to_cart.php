<?php
	session_start();
	$id = $_POST['id'];
	$quantity = $_POST['quantity'];
	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'][$id] = $quantity;
	} else {
		$_SESSION['cart'][$id] += $quantity;
	}
	array_values($_SESSION['cart']);

	$_SESSION['class'] = "primary";
	$_SESSION['message'] = "$quantity was successfully added to cart";
	
	header('Location: /');

?>