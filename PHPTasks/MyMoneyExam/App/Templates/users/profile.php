<?php /** @var \App\Data\UserDTO $data */ ?>
<?php /** @var array $errors|null */?>

<h1>YOUR PROFILE</h1>
<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post">
    <div>
        Username:<label>
            <input type="text" name="username" value="<?=$data->getUsername() ?>">
        </label>
    </div>

    <div>
        Password:<label>
            <input type="password" name="password" required>
        </label>
    </div>

    <div>
        Full Name:<label>
            <input type="text" name="full_name" value="<?=$data->getFullName() ?>" >
        </label>
    </div>


    <div>
        Birthday:<label>
            <input type="date" name="born_on" value="<?=$data->getBornOn() ?>">
        </label>
    </div>
    <input type="submit" name="edit" value="Edit Profile">
</form>

You can <a href="logout.php">logout</a> or see <a href="all.php">all users</a>