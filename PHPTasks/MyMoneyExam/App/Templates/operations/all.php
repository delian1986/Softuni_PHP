<?php /** @var \App\Data\OperationDTO[] $data */ ?>

<h1>All Operations</h1>
<table border="1px">
    <thead>
    <tr>
        <td>Date</td>
        <td>Type</td>
        <td>Reason</td>
        <td>Sum</td>
        <td>Notes</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php foreach ($data

    as $operation): ?>
    <?php if (isset($_GET['highlight_id']) && $_GET['highlight_id'] == $operation->getId()): ?>
        <tr style="background-color: lightgreen ">
            <td><?= $operation->getForDate() ?></td>
            <?php if ($operation->getType() === 'O'): ?>
                <td>Expense</td>
            <?php elseif ($operation->getType() === 'I'): ?>
                <td>Income</td>
            <?php endif; ?>
            <td><?= $operation->getReason()->getName() ?></td>
            <td><?= $operation->getSum() ?></td>
            <td><?= $operation->getNotes() ?></td>
            <td><a href="edit_operation.php?id=<?= $operation->getId(); ?>">Edit</a></td>
            <td><a href="delete_operation.php?id=<?= $operation->getId(); ?>">Delete</a></td>
        </tr>
    <?php else: ?>
    <tr>
        <td><?= $operation->getForDate() ?></td>
        <?php if ($operation->getType() === 'O'): ?>
            <td>Expense</td>
        <?php elseif ($operation->getType() === 'I'): ?>
            <td>Income</td>
        <?php endif; ?>
        <td><?= $operation->getReason()->getName() ?></td>
        <td><?= $operation->getSum() ?></td>
        <td><?= $operation->getNotes() ?></td>
        <td><a href="edit_operation.php?id=<?= $operation->getId(); ?>">Edit</a></td>
        <td><a href="delete_operation.php?id=<?= $operation->getId(); ?>">Delete</a></td>
        <?php endif; ?>
        <?php endforeach; ?>

    </thead>
</table>

<ul>
    <li><a href="add_operation.php">Add new operation</a></li>
    <li><a href="statistics.php">Statistics</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>