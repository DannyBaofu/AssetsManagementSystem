<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="/" class="navbar-brand">B2 ECOM</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
        <div class="navbar-nav">
            <a href="/" class="nav-link">Home</a>

            <?php if(!isset($_SESSION['user_details'])): ?>
            <a href="/views/forms/login.php" class="nav-link">Login</a>
            <a href="/views/forms/register.php" class="nav-link">Register</a>
            <?php endif; ?>

            <?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin == false): ?>
            <a href="/views/cart.php" class="nav-link">Cart</a>
            <?php endif; ?>

            <?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin): ?>
            <a href="/views/payments.php" class="nav-link">Payments</a>
            <?php endif; ?>

            <?php if(isset($_SESSION['user_details'])): ?>
            <a href="/controllers/process_logout.php" class="nav-link">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>