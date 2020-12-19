<?php

session_start();
require_once 'helpers.php';
$payments = get_payments();
date_default_timezone_set("Asia/Kuala_Lumpur");

/*
Characters commonly used for time:
H - 24 hourformat (00 to 23)
h - 12 hour format with leading zeroes (01 to 12)
i - minutes with leading zeroes (00 to 59)
s - seconds with leading zeroes (00 to 59)
a - lowercase ante meridiem or post meridiem (am or pm)
*/

// echo date("h:i:sa");

// echo "<br>";
/*
Characters commonly used for dates:

    d- represents the day of the month (01 to 31)
    D - represents the day of the month in words (mon - sun)
    m - represent a month (01 to 12)
    M -represents the month in words ( Jan - Dec)
    Y - represents a year in four digits (2020)
    y - represents a year in two digits (20)
    l - represents the day of the week the whole world ( Monday- Friday)
*/
// echo intval (date("H")+ 5);

//Create a new payment record
$new_payment = new stdClass();
$new_payment->username = $_SESSION['user_details']->username;
$new_payment->total = $_POST['total'];
$new_payment->date_created = date("Y/m/d h:i:sa"); //2020/12/10  current time (01:46:08pm)
$new_payment->transaction_code = "TSC-".date('His')."-".mt_rand();

$payments[] = $new_payment;

file_put_contents('../data/payments.json',json_encode($payments,JSON_PRETTY_PRINT));

unset($_SESSION['cart']);//clear cart

$_SESSION['class'] = 'success';
$_SESSION['message'] = 'Checkout success';

header("Location: /");
