<? /** @var \TaskManagement\DTO\CategoryDTO[] $data */?>
<h1>Report by category</h1>
<a href="dashboard.php">List</a> | <a href="report.php">Report page</a> | <a href="logout.php">logout</a>
<br/>
<table border="1">
    <thead>
        <tr>
            <th>Category</th>
            <th>Tasks</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php foreach ($data as $item) :?>
        <td><?= $item->getName() ?></td>
        <td><?= $item->getTaskCount()?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
