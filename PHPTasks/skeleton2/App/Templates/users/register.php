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
        First Name:<label>
            <input type="text" name="firstName">
        </label>
    </div>

    <div>
        Last Name:<label>
            <input type="text" name="lastName">
        </label>
    </div>

    <div>
        Birthday:<label>
            <input type="text" name="bornOn">
        </label>
    </div>
    <input type="submit" name="register" value="Register">
</form>