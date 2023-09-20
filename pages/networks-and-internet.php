<?php include('../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php');  ?>
<?php 
require '../vendor/autoload.php';
$Parsedown = new Parsedown(); 
?>
    <?php echo $Parsedown->text(file_get_contents("./networks_and_internet.md")); ?>
