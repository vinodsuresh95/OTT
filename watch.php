<?php
$hideNav = true;
require_once("includes/header.php");

if(!isset($_GET["id"])) {
    ErrorMessage::show("No ID passed into page");
}

$video = new Video($con, $_GET["id"]);
$video->incrementViews();

$upNextVideo = VideoProvider::getUpNext($con, $video);
?>
<div class="watchContainer">

    <div class="videoControls watchNav">
        <button onclick="goBack()"> <i class="fas fa-arrow-left"></i></button>
        <h2><?php echo $video->getTitle(); ?>&nbsp;&nbsp;&nbsp;
        <h2><?php echo $video->getSeasonAndEpisode(); ?></h2>
    </div>

    <div class="videoControls upNext" style="display: none;">

        <button onclick="reStartVideo();"> <i class="fas fa-redo"></i></button>
        <div class="upNextContainer">
             <h4>Up next:</h4>
             <h4><?php echo $upNextVideo->getTitle(); ?></h4>
             <h4><?php echo $upNextVideo->getSeasonAndEpisode(); ?></h4>

             <button class="playNext" onclick="watchNextVideo(<?php echo $upNextVideo->getId(); ?>);">
                  <i class="fas fa-play"> Play</i>
            </button>
        </div>
    
    </div>


    <video controls controlsList="nodownload" onended="showUpNext()">
        <source src='<?php echo $video->getFilePath(); ?>' type="video/mp4">

    </video>
</div>

<script>
    initVideo("<?php echo $video->getId(); ?>", "<?php echo $userLoggedIn; ?>");
</script>

