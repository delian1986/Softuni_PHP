<?php /**@var $data */?>
<?php /** @var array $errors */?>

<h1>User Login </h1>
<?php if($data!=""):?>
<p style="color: green">Welcome, <?= $data ?>! Please Log in!</p>
<?php endif ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

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

<p>Don't have and account? <a href="register.php">Register</a></p>