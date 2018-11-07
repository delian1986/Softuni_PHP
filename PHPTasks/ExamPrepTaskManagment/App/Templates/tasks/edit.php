<?php /** @var \App\Data\EditTaskDTO $data */ ?>
<h1>Edit task "<?= $data->getTask()->getTitle() ?>"</h1>
<form method="post">
    Title:<input type="text" name="title" value="<?= $data->getTask()->getTitle() ?>"/><br/>
    Category:<select name="category">
        <?php foreach ($data->getCategories() as $category): ?>
            <?php if ($data->getTask()->getCategory()->getId() === $category->getId()) : ?>
                <option selected="selected" value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php else: ?>
                <option selected="selected" value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    Description:<input type="text" value="<?= $data->getTask()->getDescription() ?>" name="description"/><br/>
    Location:<input type="text" name="location" value="<?= $data->getTask()->getLocation() ?>"/><br/>
    Started on:<input type="date" name="startedOn" value="<?= $data->getTask()->getStartedOn() ?>"/><br/>
    Due date:<input type="date" name="dueDate" value="<?= $data->getTask()->getDueDate() ?>"/><br/>
    <input type="submit" name="edit" value="Edit">
</form>

<a href="index.php">List</a>