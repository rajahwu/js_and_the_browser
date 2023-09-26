<?php // include('../shared/pages_layout.php'); 
?>

<?php include('../../private/initialize.php');
include(SHARED_PATH . '/header.php');
require '../../vendor/autoload.php';

$Parsedown = new Parsedown();
?>
<div class="container mx-5">
    <div class="prose">
        <a class="btn" href="./example.php">Handling Events</a>
        <a href="./exercies.php">Events Exercies</a>
        <?php echo $Parsedown->text(file_get_contents("./notes.md")); ?>
    </div>
    <?php include(SHARED_PATH . '/footer.php') ?>
</div>