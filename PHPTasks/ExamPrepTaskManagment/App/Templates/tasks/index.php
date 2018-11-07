<?php /** @var \App\Data\TaskDTO[] $data */ ?>

<h1>All Tasks</h1>
<a href="add_task.php">Add new task</a> | <a href="logout.php">logout</a>
<br/>
<br/>
<table border="1px">
    <thead>
    <tr>
        <td>Title</td>
        <td>Category</td>
        <td>Author</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    </thead>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row->getTitle() ?></td>
            <td><?= $row->getCategory()->getName() ?></td>
            <td><?= $row->getAuthor()->getFirstName() ?></td>
            <td><a href="edit_task.php?id=<?= $row->getId() ?>">Edit</a></td>
            <td><a href="delete_task.php?id=<?= $row->getId() ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<br/>
<a href="index.php">List</a>
