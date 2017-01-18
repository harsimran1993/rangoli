


<!--Video Section-->
<div id="video" class="content-section video-section" style = "height:100%;">
<div class="pattern-overlay">
<a id="bgndVideo" class="player" 
	data-property="{videoURL:<?php echo "'"; echo $vidurl; echo "'";?>,containment:'.video-section', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a>

</div>
</div>
<!--Video Section Ends Here-->
<script>
$(document).ready(function () {

    $(".player").mb_YTPlayer();

});</script>