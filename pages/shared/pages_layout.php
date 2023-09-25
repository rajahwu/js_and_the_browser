<?php
include_once('../../private/initialize.php');
include_once('../pages_init.php'); 
include('../shared/pages_header.php');
echo $Parsedown->text(file_get_contents("./notes.md"));
include('../shared/pages_footer.php');
include(SHARED_PATH . '/footer.php');
