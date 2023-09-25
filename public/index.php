<?php include('../private/initialize.php'); ?>

<?php
include(SHARED_PATH . '/header.php');
include('../vendor/autoload.php');
$Parsedown = new Parsedown();
?>
<div class="container flex">
    <div class="mx-auto prose prose-h1:text-primary prose-h2:text-secondary prose-a:text-accent hover:text-secondary">
        <div id="slideshow-container" class="flex">
            <button id="left_slide_btn">left</button>
            <div id="slideshow-content"></div>
            <button id="right_slide_btn">right</button>
        </div>
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