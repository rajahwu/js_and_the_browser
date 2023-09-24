<?php
include_once('../../private/initialize.php');
include_once('../pages_init.php'); ?>
<div class="prose">
    <?php echo $Parsedown->text(file_get_contents("./notes.md")); ?>
</div>
<?php include(SHARED_PATH . '/footer.php') ?>