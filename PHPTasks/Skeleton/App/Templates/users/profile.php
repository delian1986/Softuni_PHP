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
            <input type="password" name="password">
        </label>
    </div>

    <div>
        First Name:<label>
            <input type="text" name="first_name" value="<?=$data->getFirstName() ?>" >
        </label>
    </div>

    <div>
        Last Name:<label>
            <input type="text" name="last_name" value="<?=$data->getLastName() ?>">
        </label>
    </div>

    <div>
        Birthday:<label>
            <input type="text" name="born_on" value="<?=$data->getBornOn() ?>">
        </label>
    </div>
    <input type="submit" name="edit" value="Edit">
</form>
