<footer id="footer">
    <div class="container">
        <div class="col-md-12 x-gutters">
            <?php $sponsors = $this->content_model->get_banners();  ?>
            <div id="sponsors" class="carousel slide" data-ride="carousel" data-interval="5000">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                <?php 
                    $count = 0; 
                    foreach($sponsors as $s){ 
                ?>
                    <div class="item <?=!$count ? 'active' : '';?>">
                        <a href="<?=base_url()?>adredirect/<?=$s['id']?>" target="_blank">
                        <img src="<?=base_url()?>uploads/banners/<?=$s['name']?>" />
                        </a>
                    </div>
                <?php $count++; } ?>
                </div>
             </div>
            
            
        </div>
    </div>
    
    <div class="sponsors">
        <div class="container">
            <div class="col-md-4 block">
                <div class="lt-block">
                    <label class="cpp-label">
                        Produced by
                    </label>
                    <img class="city-pp-logo" src="<?=base_url();?>frontend-assets/img/core/city-port-phillip-logo.png" alt="city-port-phillip-logo.png" title="City Of Port Phillip Logo">
                </div>
            </div>
            
            <div class="col-md-8 block">
                <div class="rt-block">
                    <label>Government Partners</label>
                    <div class="col-md-7 x-gutters gov-sp scr-aus">
                        <img src="<?=base_url();?>frontend-assets/img/core/screen-australia-logo.png" alt="screen-australia-logo.png" title="Screen Australia Logo">
                    </div>
                    
                    <div class="col-md-5 x-gutters gov-sp film-vic">
                        <img src="<?=base_url();?>frontend-assets/img/core/film-vic-logo.png" alt="film-vic-logo.png" title="Film Victoria Logo">
                    </div>
                    <label class="skf-ack">The St Kilda Film Festival acknowledges the financial assistance of Screen Australia and Film Victoria.</label>
                </div>
            </div>
        </div>
    </div>
    
    <div class="quick-links">
        <div class="container">
            <div class="col-md-8 block">
                <div class="rt-block">
                    <div class="col-md-7 x-gutters">
                        <h6>St Kilda Film Festival</h6>
                        <p>
                            The St Kilda Film Festival is one of Australia's<br>
                            largest and oldest short film festivals.
                        </p>
                        
                        <?php if(0){ # commented until stage 2?>
                        <!--<ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Festival Credits</a></li>
                        </ul>-->
                        <?php } ?>
                    </div> 
                    
                    <div class="col-md-5 x-gutters">
                        <h6>Contact Us</h6>
                        <p>
                            Festival Office: (03) 9209 6490<br>
                            City of Port Phillip ASSIST: (03) 9209 6777
                        </p>
                        
                        <p>
                            St Kilda Film Festival<br>
                            Private Bag 3<br>
                            PO St Kilda VIC 3182
                        </p>
                        
                        <p><a href="mailto:filmfest@portphillip.vic.gov.au">filmfest@portphillip.vic.gov.au</a></p>
                        
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>
    
    
</footer>  
<script>
$(function(){
	// ladders.init();
	
	/*setTimeout(function(){
		ladders.init();
	},400);*/
	
	 ladders.respond();
	$(window).resize(function() {
        ladders.respond();
		//ladders.init();
    });
	
	// ADD SLIDEDOWN ANIMATION TO DROPDOWN //
	$('.mob-dd').on('show.bs.dropdown', function(e){
	  $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});
	
	// ADD SLIDEUP ANIMATION TO DROPDOWN //
	$('.mob-dd').on('hide.bs.dropdown', function(e){
	  $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});
});


</script>


</body>
</html>