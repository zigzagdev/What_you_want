<?php

if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Panel !";
    header("location:" . SITEURL . 'order/login.php');
}

?>