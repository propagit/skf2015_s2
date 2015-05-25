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
           <div class="col-md-3 block city-pp-block">
               <div class="lt-block">
                   <label class="cpp-label">
                       Produced by
                   </label>
                   <a href="http://www.portphillip.vic.gov.au" target="_blank"><img class="city-pp-logo" src="<?=base_url();?>frontend-assets/img/core/city-port-phillip-logo.png" alt="city-port-phillip-logo.png" title="City Of Port Phillip Logo"></a>
               </div>
           </div>

           <div class="col-md-7 block">
               <div class="rt-block">
                   <label>Government Partners</label>
                   <div class="col-md-5 x-gutters gov-sp scr-aus">
                       <a href="http://www.screenaustralia.gov.au" target="_blank"><img src="<?=base_url();?>frontend-assets/img/core/screen-australia-logo.png" alt="screen-australia-logo.png" title="Screen Australia Logo"></a>
                   </div>

                   <div class="col-md-5 x-gutters gov-sp film-vic">
                       <a href="http://www.film.vic.gov.au" target="_blank"><img src="<?=base_url();?>frontend-assets/img/core/film-vic-logo.png" alt="film-vic-logo.png" title="Film Victoria Logo"></a>
                   </div>
                   <label class="skf-ack">The St Kilda Film Festival acknowledges the financial assistance of Screen Australia and Film Victoria.</label>
               </div>
           </div>

           <div class="col-md-2 block">
               <div class="rt-block">
                   <label>Major Partner</label>
                   <div class="col-xs-12 x-gutters partner-logo">
                       <a href="https://www.olympus.com.au" target="_blank"><img src="<?=base_url();?>frontend-assets/img/olympus-logo.png" alt="olympus-logo.png" title="Olympus Logo"></a>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <div class="quick-links">
       <div class="container">
       	<div class="col-md-4 col-sm-12 col-xs-12 block lt-block">
               <h6>subscribe</h6>
               <p>News delivered straight to your inbox</p>
               <div class="subscribe-box">
                   <input type="text" id="newsletter-email">
                   <button type="button" class="btn subscribe-btn" id="newsletter-btn">Enter</button>
               </div>
           </div>
       	
           <div class="col-md-8 col-sm-12 col-xs-12 block">
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
                       PO St Kilda VIC 3182<br>


                   <a href="mailto:filmfest@portphillip.vic.gov.au">filmfest@portphillip.vic.gov.au</a>

                  </p>
                 <p><strong>Media Enquiries</strong><br>
                   Call: (03) 9690 9911<br>
					email: <a href="mailto:media@stkildafilmfestival.com.au">media@stkildafilmfestival.com.au</a> </p>



               </div> 
           </div>
       </div>
   </div>


</footer>  


<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
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