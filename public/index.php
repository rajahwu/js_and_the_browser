<?php include('../private/initialize.php'); ?>

<?php
include(SHARED_PATH . '/header.php');
include('../vendor/autoload.php');
$Parsedown = new Parsedown();
?>
<div class="container flex">
    <div class="prose">
        <h1>The Browser</h1>
        <div id="slideshow-container"></div>
        <?php echo $Parsedown->text(file_get_contents("../readme.md")); ?>
    </div>
</div>
<div id="react_root" style="display: none;"></div>
</div>

<script src="./js/slideshow.js"></script>
<script src="../node_modules/react/umd/react.production.min.js"></script>
<script src="../node_modules/react-dom/umd/react-dom.production.min.js"></script>
<script src="./dist/bundle.js"></script>
<?php include(SHARED_PATH . '/footer.php'); ?>