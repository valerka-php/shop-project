<?php
    if (isset($_POST['logout'])){
        unset($_SESSION['user']);
        header('location:/');
    }
?>


<h1> You are welcome <b> <?= $name ?> </b> </h1>


<form action="" method="post">
    <button type="submit" class="btn btn-primary btn-lg" name="logout">logout</button>
</form>