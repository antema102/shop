<?php

include 'db.php';
unset($_SESSION['user']);
unset($_SESSION['cart']);



echo '<script>window.location=("login.php") </script>';
?>
