<div class="container">
	<div class="col-md-8 x-l-gutter">
    	<div class="cms-body film">
        	<img src="<?=base_url() . ($film['large_image'] ? "uploads/films/" . $film['large_image'] : "frontend-assets/img/core/default-placeholder.png")?>" width="100%" /> 
            
            <div class="detail">
                <div class="col-md-8 x-gutters">
                    <h1 class="title"><?=$film['title'];?></h1>
                    <h3><?= date("l j F g:i A ",strtotime($sessions[0]['time']))?></h3>
                    <h3><?= $sessions[0]['venue']?></h3>
                    
                    <span class="fares">
                    	<?php if($film['type'] == 2){ # soundkilda film ?>
                        	<span class="fare-solo">$<?=FULL_PRICE_SOUNDKILDA;?> Full/$<?=CONCESSION_PRICE_SOUNDKILDA;?> Concession</span>
                        <?php }else{ ?>
                    		<span class="fare-solo">$<?=FULL_PRICE;?> Full/$<?=CONCESSION_PRICE;?> Concession</span>
                        <?php } ?>
                        <?php if(0){ ?>
                    		<span class="fare-group">Group bookings for 6 or more: $13.50 per person</span>
						<?php } ?>
                    </span>
                </div>
                <div class="col-md-4 x-gutters">
                    <button class="btn btn-buy pull" href="#">Buy Tickets</button>
                    <div style="float:right; margin-top:15px;" class="fb-like" data-href="<?=base_url();?>/details/<?=$film['id'];?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                </div>
                
                <div class="col-xs-12 x-gutters">
                    <p class="synopsis"><?=$film['synopsis'];?></p>
                </div>
                
                <?php 
				if(0){
				#if($film['youtube']){ 
				?>
                	<!--<div class="col-xs-12 x-gutters app-iframe film-trailer">
                    	<iframe width="560" height="315" src="https://www.youtube.com/embed/IuisYC9x3Y0" frameborder="0" allowfullscreen></iframe>
                    </div>-->
                <?php } ?>
            </div>
        </div>
    </div>
    
    
	<div class="col-md-4 x-r-gutter">
		<?=$this->load->view('stk/common/right');?>
	</div>
</div>