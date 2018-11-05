<?php /** $data[] */
require APPROOT.'/Views/inc/header.php';
?>
<h1><?= $data['title'];?></h1>
<p><?= $data['description'];?></p>
<p>Version <strong><?= APP_VERSION?></strong></p>


<?php require APPROOT.'/Views/inc/footer.php'; ?>
