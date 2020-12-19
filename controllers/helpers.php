<?php 

function get_users() {
	$data = file_get_contents('../data/users.json');
	$users = json_decode($data);
	return $users;
}

function get_products($url) {
	$data = file_get_contents($url);
	$products = json_decode($data);
	return $products;
}

function get_payments() {
	$data = file_get_contents('../data/payments.json');
	$payments = json_decode($data);
	return $payments;
}

 ?>