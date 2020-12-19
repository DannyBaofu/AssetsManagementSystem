<?php
    session_start();

    if(!isset($_SESSION['user_details'])&& !$_SESSION['user_details']->isAdmin){
        header('Location: /views/forms/login.php');
    }
    $title = "Payments";
    require_once '../controllers/helpers.php';
    function get_content(){
        $payments = get_payments();
?>

<div class="container">
        <div class="row">
        <?php foreach($payments as $payment): ?>
        <div class="card mt-4 w-100">
            <div class="card-header bg-primary text-white">
            <?php echo $payment->transaction_code; ?>
            </div>
            <div class="card-body">
                <?php echo $payment->username; ?>
                <h5>RM <?php echo $payment->total; ?></h5>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
</div>




<?php
    }
    require_once 'partials/layout.php';
?>