<?php include('../private/initialize.php'); ?>

<?php
include(SHARED_PATH . '/header.php');
include('../vendor/autoload.php');
$Parsedown = new Parsedown();
?>
<div class="container flex">
    <div class="mx-auto my-10 prose prose-h1:text-primary prose-h2:text-center prose-a:text-accent prose-a:hover:text-primary">
        <div id="slideshow-container" class="flex">
            <button id="left_slide_btn" class="opacity-50">
                <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 4V20M19 7.329V16.671C19 17.7367 19 18.2696 18.7815 18.5432C18.5916 18.7812 18.3035 18.9197 17.9989 18.9194C17.6487 18.919 17.2327 18.5861 16.4005 17.9204L10.5617 13.2494C10.0279 12.8223 9.76097 12.6088 9.66433 12.3508C9.5796 12.1246 9.5796 11.8754 9.66433 11.6492C9.76097 11.3912 10.0279 11.1777 10.5617 10.7506L16.4005 6.07961C17.2327 5.41387 17.6487 5.081 17.9989 5.08063C18.3035 5.0803 18.5916 5.21876 18.7815 5.45677C19 5.73045 19 6.2633 19 7.329Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg></button>
            <div id="slideshow-content"></div>
            <button id="right_slide_btn" class="opacity-50">
                <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 20V4M5 16.671V7.329C5 6.2633 5 5.73045 5.21846 5.45677C5.40845 5.21876 5.69654 5.0803 6.00108 5.08063C6.35125 5.081 6.76734 5.41387 7.59951 6.07961L13.4383 10.7506C13.9721 11.1777 14.239 11.3912 14.3357 11.6492C14.4204 11.8754 14.4204 12.1246 14.3357 12.3508C14.239 12.6088 13.9721 12.8223 13.4383 13.2494L7.59951 17.9204C6.76734 18.5861 6.35125 18.919 6.00108 18.9194C5.69654 18.9197 5.40845 18.7812 5.21846 18.5432C5 18.2695 5 17.7367 5 16.671Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg></button>
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