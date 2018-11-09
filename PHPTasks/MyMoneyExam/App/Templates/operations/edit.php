<?php /** @var \App\Data\EditOperationDTO $data */ ?>
<?php /** @var array $errors |null */ ?>

<h1>Edit operation </h1>
<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post">
    Type: <select name="type">
        <?php if ($data->getOperation()->getType() == "O") : ?>
            <option selected="selected" value="O">Expense</option>
            <option value="I">Income</option>

        <?php else: ?>
            <option selected="selected" value="I">Income</option>
            <option value="O">Expense</option>

        <?php endif; ?>
    </select>
    <br/>
    Reason:<select name="reason_id">
        <?php foreach ($data->getReasons() as $reason) : ?>
            <?php if ($data->getOperation()->getReason()->getId() == $reason->getId()): ?>
                <option selected="selected" value="<?= $reason->getId() ?>"><?= $reason->getName() ?></option>
            <?php else: ?>
                <option selected="selected" value="<?= $reason->getId() ?>"><?= $reason->getName() ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <br/>
    Sum:<input type="text" name="sum" value="<?=$data->getOperation()->getSum() ?>" required/> <br/>

    Notes:<input type="text" name="notes" value="<?=$data->getOperation()->getNotes() ?>"/> <br/>

    For Date:<input type="date" name="for_date" value="<?= $data->getOperation()->getForDate() ?>"/> <br/>

    <input type="submit" name="save" value="Save">
</form>
