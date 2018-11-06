<?php /** @var \App\Data\UserDTO $data */ ?>

<h1>YOUR PROFILE</h1>
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
        First Name:<label>
            <input type="text" name="firstName" value="<?=$data->getFirstName() ?>" >
        </label>
    </div>

    <div>
        Last Name:<label>
            <input type="text" name="lastName" value="<?=$data->getLastName() ?>">
        </label>
    </div>

    <input type="submit" name="edit" value="Edit Profile">
</form>

You can <a href="logout.php">logout</a> or see <a href="all.php">all users</a>