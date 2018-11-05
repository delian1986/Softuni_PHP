<?php /** $data[] */
require APPROOT . '/Views/inc/header.php';
?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?=URLROOT;?>posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add new post
        </a>
    </div>
</div>

<?php foreach ($data['posts'] as $post):?>
    <div class="card card-body mb-3">
        <h4 class="card-title">
            <?= $post->postTitle?>
        </h4>
        <div class="bg-light p-2 mb-3">
            written by: <?= $post->author?> on <?= $post->postCreatedAt?>
        </div>
        <p class="card-text">
            <?= $post->postBody?>
        </p>
        <a href="<?=URLROOT ?>posts/show/<?= $post->postId;?>" class="btn btn-dark">
            More
        </a>
    </div>
<?php endforeach; ?>
<?php require APPROOT . '/Views/inc/footer.php'; ?>

