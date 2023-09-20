<?php include('../../private/initialize.php');
      include(SHARED_PATH . '/header.php');
      require '../../vendor/autoload.php';

$Parsedown = new Parsedown();
?>
<div class="container mx-5">
    <div class="prose">
        <?php echo $Parsedown->text(file_get_contents("./notes.md")); ?>
    </div>
    <?php include(SHARED_PATH . '/footer.php') ?>
</div>