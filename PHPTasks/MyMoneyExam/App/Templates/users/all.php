<?php /** @var \App\Data\UserDTO[] $data */ ?>
<h1>All Users</h1>
<table border="1">
    <thead>
    <tr>
        <td>Id</td>
        <td>Username</td>
        <td>Full Name</td>
        <td>Born On</td>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($data as $user) : ?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getUsername() ?></td>
            <td><?= $user->getFullName() . ' ' . $user->getLastName() ?></td>
            <td><?= $user->getBornOn() ?></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

Go back to your <a href="profile.php">profile</a>