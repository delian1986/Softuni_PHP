<?php /** @var \TaskManagement\DTO\EditTaskDTO $data */ ?>
<?php /** @var \TaskManagement\DTO\CategoryDTO $category */ ?>
<h1>Edit Task <?= $data->getTask()->getTitle()?></h1>

<form method="post">
    Title: <input type="text" value="<?= $data->getTask()->getTitle() ?>" name="title" minlength="3"
                  maxlength="50"><br/>
    Category: <select name="category_id">
        <?php foreach ($data->getCategories() as $category) : ?>
            <?php if ($data->getTask()->getCategory()->getId() == $category->getId()) : ?>
                <option selected="selected" value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php else: ?>
                <option selected="selected" value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <br/>
    Description: <textarea name="description" minlength="10" maxlength="10000"><?= $data->getTask()->getDescription() ?></textarea><br/>
    Location: <input type="text" value="<?= $data->getTask()->getLocation() ?>" name="location" minlength="3" maxlength="50"><br/>
    Started On: <input type="date" value="<?= $data->getTask()->getStartedOn() ?>" name="started_on"/><br/>
    Due Date: <input type="date" value="<?= $data->getTask()->getDueDate() ?>" name="due_date"/><br/>
    <input type="submit" name="edit" value="Edit"><br/>
</form>
<br>
<a href="dashboard.php">List</a>