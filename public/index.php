<?php include('../private/initialize.php'); ?>

<?php
include(SHARED_PATH . '/header.php');
include('../vendor/autoload.php');
$Parsedown = new Parsedown();
?>
<div class="prose">

    <h1>The Browser</h1>
    <?php echo $Parsedown->text(file_get_contents("../readme.md")); ?>
    <div id="react_root"></div>
    <script src="../node_modules/react/umd/react.production.min.js"></script>
    <script src="../node_modules/react-dom/umd/react-dom.production.min.js"></script>
    <script src="./dist/bundle.js"></script>
    <?php include(SHARED_PATH . '/footer.php'); ?>
</div>