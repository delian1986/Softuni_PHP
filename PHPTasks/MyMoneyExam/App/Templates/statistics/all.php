<?php /** @var \App\Data\ReportStatisticDTO $data */ ?>

<h1>Statistics for <?=$data->getUser()->getFullName() ?></h1>

<table border="1px">
    <tr>
        <td>Reasons</td>
        <td>Operations</td>
        <td>Total</td>
    </tr>
    <?php foreach ($data->getStatistic() as $statistic):?>
    <tr>
        <td><?= $statistic->getReasons() ?></td>
        <td><?= $statistic->getOperations() ?></td>
        <td><?= $statistic->getTotal() ?></td>
    </tr>
    <?php endforeach;?>
</table>
<br>
<a href="operations.php">List</a> <br>
<a href="add_operation.php">Add new operation</a><br>
<a href="logout.php">Logout</a><br>

