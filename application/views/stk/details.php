<?php
	$genres = $this->film_model->get_film_genres($film['id']); 
	$genre = $genres ? implode(' / ', array_column($genres, 'name')) : '';
?>

<div class="container">
	<div class="col-md-8 x-l-gutter">
    	<div class="cms-body film">
        	<img src="<?=base_url() . ($film['large_image'] ? "uploads/films/" . $film['large_image'] : "frontend-assets/img/core/default-placeholder.png")?>" width="100%" /> 
            
            <div class="detail">
                <div class="col-md-8 x-gutters">
                    <h1 class="title"><?=$film['title'];?></h1>
                    <h3><?= date("l j F g:i A ",strtotime($sessions[0]['time']))?></h3>
                    <h3><?= $sessions[0]['venue']?></h3>
                    <span class="genre"><?=$genre;?></span>
                    <ul class="credits">
                    	<?=$film['year'] ? '<li><strong>Year</strong> ' . $film['year'] . '</li>' : '';?>
                        <?=$film['running_time'] ? '<li><strong>Running Time </strong>' . $film['running_time'] . '</li>' : '';?>
                        <?=$film['format'] ? '<li><strong>Format </strong>' . $film['format'] . '</li>' : '';?>
						<?=$film['director'] ? '<li><strong>Director </strong>' . $film['director'] . '</li>' : '';?>
                        <?=$film['producer'] ? '<li><strong>Producer </strong>' . $film['producer'] . '</li>' : '';?>
                        <?=$film['screen_writer'] ? '<li><strong>Screenwriter </strong>' . $film['screen_writer'] . '</li>' : '';?>
                        <?=$film['photography_director'] ? '<li><strong>DOP </strong>' . $film['photography_director'] . '</li>' : '';?>
                    </ul>
                    
                    <span class="fares">
                    	<?php if($film['free_event']){ ?>
                    		<span class="fare-solo">FREE EVENT</span>
                        <?php }else{ ?>
							<?php if($film['type'] == 2){ # soundkilda film ?>
                                <span class="fare-solo">$<?=FULL_PRICE_SOUNDKILDA;?> Full/$<?=CONCESSION_PRICE_SOUNDKILDA;?> Concession</span>
                            <?php }else{ ?>
                                <span class="fare-solo">$<?=FULL_PRICE;?> Full/$<?=CONCESSION_PRICE;?> Concession</span>
                            <?php } ?>
                            <?php if(0){ ?>
                                <span class="fare-group">Group bookings for 6 or more: $13.50 per person</span>
                            <?php } ?>
                        <?php } ?>
                    </span>
                </div>
                <div class="col-md-4 x-gutters">
                	<?php if(!$film['free_event']){ ?>
                    <button class="btn btn-buy pull" href="#">Buy Tickets</button>
                    <?php } ?>
                    <div style="float:right; margin-top:<?=!$film['free_event'] ? '15px;' : '0px;';?>" class="fb-like" data-href="<?=base_url();?>/details/<?=$film['id'];?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
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