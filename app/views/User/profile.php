<?php
    if  (!isset($_SESSION['user'])){
        header("location:/user/login");
    }

    if (isset($_POST['logout'])){
        unset($_SESSION['user']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);
        header('location:/');
    }

?>


<h1> You are welcome <b> <?= $name ?> </b> </h1>



