<?php /** $data[] */
require APPROOT . '/Views/inc/header.php';
?>
<a href="<?= URLROOT ?>posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br/>

<h1><?= $data['post']->postTitle ?></h1>
<div class="bg-secondary text-white p-2 m-3">
    Written by <?= $data['post']->author ?> on <?= $data['post']->postCreatedAt ?>
</div>
<p><?= $data['post']->postBody ?> </p>
<?php if ($data['post']->user_id === $_SESSION['user_id']): ?>
    <hr>
    <a href="<?= URLROOT ?>posts/edit/<?= $data['post']->post_id ?>" class="btn btn-dark">Edit</a>
        <form class="pull-right" action="<?= URLROOT;?>posts/delete/<?= $data['post']->post_id ?>" method="POST">
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
<?php endif; ?>

<? require APPROOT . '/Views/inc/footer.php'; ?>

