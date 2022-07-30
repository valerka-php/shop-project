<?php use Framework\helpers\Session; ?>

<div class="sing-in-form">
    <form action="" method="post">
        <div class="col-md">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login" required>
        </div>
        <br>
        <div class="col-md">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-login" name="click">Log In</button>
        </div>
        <div>
            <a href="/account/registration"> You haven`t account? </a>
        </div>

        <div>
            <?php Session::showMessage(); ?>
        </div>
    </form>
</div>

