<?php /** @var \App\Data\TaskDTO[] $data */?>

<h1>All Tasks</h1>
<a href="add.php">Add new task</a> | <a href="logout.php">logout</a>

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
    <?php foreach ($data as $row):?>
        <td><?= $row->getTitle() ?></td>
        <td><?= $row->getCategory()->getType() ?></td>
        <td><?= $row->getAuthor()->getFirstName() ?></td>
        <td><a href="edit.php?=<?= $row->getId()?>" </td>
        <td><a href="delete.php?=<?= $row->getId()?>" </td>
    <?php endforeach;?>
</table>
