<script>
$(document).ready(function() {
    $('#sponsors').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		timeout: 7000
	});
});
</script>
<div id="purple-container-advertising" >
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        	<div id="sponsors" style=" margin-bottom:20px; ">
            <?php 
		  $banners = $this->content_model->get_banners(); 
	      if($banners != NULL)
		  {
			
			foreach($banners as $banner) 
			{ 
				?>
            <div ><a href="<?=base_url()?>adredirect/<?=$banner['id']?>" target="_blank"><img src="<?=base_url()?>uploads/banners/<?=$banner['name']?>" style="width:100%;" /></a></div>
          <?
			} 
         }
		 else
		 {?>
		 	<div ><img src="<?=base_url()?>img/ad.png" style="width: 100%" al="ad"></div>
		<? }
		 ?>
            </div>
            <!--<a href="http://www.airasia.com" target="_blank"><img src="<?=base_url()?>img/ad.png" style="width: 100%"/></a>-->
        	 <!-- <script src="<?=base_url()?>js/jquery.tools.min.js" type="text/javascript"></script>
			 <script src="<?=base_url()?>js/script.js" type="text/javascript"></script>
             <script src="<?=base_url()?>js/jquery.quicksand.js" type="text/javascript"></script> -->
             
             <!-- <div style="clear:both;"></div>
             <div id="sponsors" style=" margin-bottom:20px;">
                <div><a href="http://www.airasia.com" target="_blank"><img src="<?=base_url()?>img/ad.png" /></a></div>
                <div><a href="http://www.film.vic.gov.au" target="_blank"><img src="<?=base_url()?>img/ad.png" /></a></div>
                <div><a href="http://www.mafmad.com.au" target="_blank"><img src="<?=base_url()?>img/ad.png" /></a></div>
                <div><a href="http://www.sonos.com.au" target="_blank"><img src="<?=base_url()?>img/ad.png" /></a></div>
             </div> -->
             <div style="height: 20px;"></div>
        </div>
    </div>
</div>
</div>
<div style="clear:both;"></div>