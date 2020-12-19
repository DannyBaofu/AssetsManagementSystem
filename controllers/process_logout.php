<?php 

//to access session variables and to use session methods a session should be started.
session_start();

//empty out session variables
session_unset();



//destroy all data register to a session
session_destroy();



header('Location: /');

 ?>
