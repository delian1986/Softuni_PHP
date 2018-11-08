

<h1>User Login</h1>
<?php if(isset($_SESSION['username'])):?>
<p style="color: green"><?= $_SESSION['username'] ?></p>
<?php endif;?>

<form method="post">
    <div>
        Username:<label>
            <input type="text" name="username">
        </label>
    </div>

    <div>
        Password:<label>
            <input type="password" name="password">
        </label>
    </div>

    <input type="submit" name="login" value="Login">
</form>