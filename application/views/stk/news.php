<script>
$(document).ready(function() {
    $('#sponsors').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		timeout: 7000
	});
});
</script>
<div id="pagecontent">
   <div id="left-container">
      <div style="min-height:1278px">
        <div>
        
        	<h1><?=$news['title']?></h1>
        	<p><?=$news['long_text']?></p>
        </div>
     <div style="clear:both"></div>
   
      <div id="sponsors" style="margin-top:150px;">
     	<div><a href="http://www.airasia.com" target="_blank"><img src="<?=base_url()?>img/AIR1984_StKildaFest.gif" /></a></div>
     	<div><a href="http://www.film.vic.gov.au" target="_blank"><img src="<?=base_url()?>img/FilmVic_SKFF_WebBannerAd2013.jpg" /></a></div>
   </div>
   </div>
  </div>
   
