<?php include('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php');  ?>
<?php 
require '../../vendor/autoload.php';
$Parsedown = new Parsedown(); 
?>
<div class="prose">
    <?php echo $Parsedown->text(file_get_contents("./notes.md")); ?>
</div>
<?php include(SHARED_PATH . './footer') ?>