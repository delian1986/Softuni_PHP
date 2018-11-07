<?php /** @var \App\Data\CategoryDTO[] $data */?>
<h1>Add new Task</h1>
<form method="post">
Title:<input type="text" name="title" minlength="3" maxlength="50"/><br/>
Category:<select name="category">
    <?php foreach ($data as $category):?>
        <option value="<?=$category->getId() ?>"><?= $category->getName()?></option>
    <?php endforeach;?>
</select><br/>
Description:<input type="text" name="description" minlength="10" maxlength="10000"/><br/>
Location:<input type="text" name="location" minlength="3" maxlength="100"/><br/>
Started on:<input type="date" name="startedOn"/><br/>
Due date:<input type="date" name="dueDate"/><br/>
<input type="submit" name="save" value="Save">
</form>
