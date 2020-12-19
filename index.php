<?php 
session_start();
$title = "Log In";
function get_content(){

?>
<section class="loginpage">

<div class="container w-100 h-100">
    <div class="row">
        <div class="col-md-6 mx-auto form1 p-0">
            <form method="POST" action="/views/forms/register.php">
            <h1 class="text-center mt-3">Hello World</h1>
            <p class="text-center mt-5 ml-3 mr-3">Welcome to ASM we provide the best service to your working space.</p>
            <div class="button2 " id="button2">
            <div id="circle"></div>
            <a href="/views/forms/register.php">Let's Go!</a>
            
            </form>
            </div>
           
        </div>
        <div class="col-md-6 mx-auto form2 p-0">
            <form method="POST" action="/controllers/process_login.php" class="loginbtn">
            <h2 class = "text-center mt-3">Login</h2>
            <div class="form-group">
            <input type="text" name="username" class="form-control mt-3" placeholder="Username">
            </div>
            <div class="form-group">
            <input type="password"name="password"class="form-control mb-0" placeholder="Password">
            </div>
            <button class="button mt-3" id=button><div id="circle"></div>Login</button>
        </form>
        </div>
    </div>
</div>

</section>

<?php
	}
	require_once 'views/partials/layout.php';
?>

