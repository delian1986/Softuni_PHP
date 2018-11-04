<?php
/** @var \App\Data\UserDTO $data */
?>

<h1> Welcome <?= $data->getUsername() ?>, you can edit your profile</h1>
<form method="POST">
    <div>
        <label>
            Username:
            <input type="text" value="<?= $data->getUsername() ?>" name="username"/>
        </label><br/>
    </div>
    <div>
        <label>
            First Name:
            <input type="text" value="<?= $data->getFirstName() ?>" name="firstName"/>
        </label><br/>
    </div>
    <div>
        <label>
            Password:
            <input type="password" name="password"/>
        </label><br/>
    </div>
    <div>
        <input type="submit" name="edit" value="Edit"/>
    </div>
</form>

You can <a href="logout.php">logout</a> or see <a href="all.php">all users</a>
