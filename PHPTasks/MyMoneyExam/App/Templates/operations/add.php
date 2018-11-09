<?php /** @var \App\Data\ReasonDTO[] $data */ ?>
<?php /** @var array $errors |null */ ?>
<h1>Add new operation</h1>
<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post">
    Type: <select name="type">
        <option value="O">Expense</option>
        <option value="I">Income</option>
    </select>
    <br/>
    Reason:<select name="reason_id">
        <?php foreach ($data as $reason) : ?>
            <option value="<?= $reason->getId() ?>"><?= $reason->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <br/>
    Sum:<input type="text" name="sum" required/> <br/>

    Notes:<input type="text" name="notes"/> <br/>

    For Date:<input type="date" name="for_date"/> <br/>

    <input type="submit" name="save" value="Save">
</form>
