<?php /** @var $data \App\Data\UserDTO|null */ ?>
<?php /** @var array $errors|null */ ?>

<h1>User Register</h1>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post">
    <div>
        Username:<label>
            <input type="text" name="username" value="<?= $data !== null ? $data->getUsername() : '' ?>">
        </label>
    </div>

    <div>
        Password:<label>
            <input type="password" name="password">
        </label>
    </div>

    <div>
        Confirm Password:<label>
            <input type="password" name="confirm_password">
        </label>
    </div>

    <div>
        Full Name:<label>
            <input type="text" name="full_name">
        </label>
    </div>

    <div>
        Birthday:<label>
            <input type="date" name="born_on">
        </label>
    </div>
    <input type="submit" name="register" value="Register">
</form>