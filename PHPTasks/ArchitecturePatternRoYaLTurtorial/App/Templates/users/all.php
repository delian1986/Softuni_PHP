<?php /** @var \App\Data\UserDTO[] $data */ ?>
<h1> All Users</h1>

<table border="1">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>First Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $user): ?>
        <tr>
            <td><?= $user->getId(); ?></td>
            <td><?= $user->getUsername(); ?></td>
            <td><?= $user->getFirstName(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
Go back to your <a href="profile.php">your profile</a>.


