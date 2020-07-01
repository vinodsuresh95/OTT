<?php

require_once("includes/header.php");

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createTVShowsPreviewVideo();


$containers = new CategoryContainer($con, $userLoggedIn);
echo $containers->showTVShowCategories();
?>