<?php include('../private/initialize.php'); ?>

<?php
include(SHARED_PATH . '/header.php');
include('../vendor/autoload.php');
$Parsedown = new Parsedown();
?>
<div class="prose">

    <h1>The Browser</h1>
    <?php echo $Parsedown->text(file_get_contents("../readme.md")); 
include(SHARED_PATH . '/footer.php');
?>
</div>

