<?php
require_once 'helpers.php';
$username = $_POST['username'];
$password = $_POST['password'];

$users = get_users();

foreach($users as $indiv_user){
    if($indiv_user->username == $username && password_verify($password, $indiv_user->password)){
        session_start();
        $_SESSION['user_details'] = $indiv_user;
        header("Location: /views/forms/homepage.php");
    }
}

echo "No user found / wrong credentials";
echo "<br>";
echo "<a href='/index.php'> Go to login</a>";

?>