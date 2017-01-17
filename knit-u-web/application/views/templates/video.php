


<!--Video Section-->
<a id="services"></a>
<div class="content-section video-section" style = "height:100%;">
<div class="pattern-overlay">
<a id="bgndVideo" class="player" 
	data-property="{videoURL:<?php echo "'"; echo $vidurl; echo "'";?>,containment:'.video-section', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a>
<div class="container">
<div class="row">
<div class="col-lg-12">
<h1></h1>
<h3></h3>
</div>
</div>
</div>
</div>
</div>
<!--Video Section Ends Here-->
<script>
$(document).ready(function () {

    $(".player").mb_YTPlayer();

});</script>