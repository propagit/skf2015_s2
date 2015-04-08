<div id="purple-container">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-9">
				<div style="height:20px;"></div>
				<div class="row">
					<div class="col-sm-12">
				        <?php if($film['large_image'] != "") { ?>
				        <img style="width: 100%" src="<?=base_url()?>uploads/films/<?=$film['large_image']?>"/>
				        <?php } else { ?>
				        <img style="width: 100%" src="<?=base_url()?>img/youtube.jpg"/>
				        <?php } ?>        	
				    </div>
				</div>
				<div class="right-gray-line">&nbsp;</div>  
				<div class="row">
					<div class="col-sm-12">
				    	<h1 id="film-title"><?=$film['title']?></h1>
				    	<div class="row">
				    		<div class="col-sm-6">
				    			<p  class="intro"><?=$film['synopsis']?></p>
				    			<p class="intro"><?=$film['publicity_blurb']?></p>
				    		</div>
				    		<div class="col-sm-6">
				    			<?=$film['year']?><br />
					            <?php if($film['format'] != "") { ?>
					            / <?=$film['format']?> <br />
					            <?php } ?>
					            <?php if ($film['running_time'] != "") { ?>
					            <span class="bold">Running Time</span> <?=$film['running_time']?>
					            <?php } ?>
					            <br/>
					            <?php if($film['artist'] != "") { ?>
					            <?=$film['artist']?> <br/>
					            <?php } ?>
					            
					            <?php if($genre != "") { ?>            
					            <span class="bold">Genre</span> <?=$genre?> <br/>
					            <?php } ?>

					            <?php if($film['director'] != "") { ?>
					            <span class="bold">Director</span> <?=$film['director']?>  <br/>					            
					            <?php } ?>

								<?php if($film['photography_director'] != "") { ?>
					            <span class="bold">Director of Photography</span> <?=$film['photography_director']?> <br/>
					            <?php } ?>

					            <?php if($film['animator'] != "") { ?>
					            <span class="bold">Animator</span> <?=$film['animator']?> <br/>
					            <?php } ?>

					            <?php if($film['producer'] != "") { ?>
					            <span class="bold">Producer</span> <?=$film['producer']?> <br/>
					            <?php } ?>

					            <?php if($film['screen_writer'] != "") { ?>
					            <span class="bold">Screenwriter</span> <?=$film['screen_writer']?> <br/>
					            <?php } ?>

					            <?php if($film['cast'] != "") { ?>
					            <span class="bold">Principal Cast</span> <?=$film['cast']?> 
					            <?php } ?>
					            <br/>
					            <br/>
					            <br/>
					            <div class="screening-detail" id="red">screening details</div>
					            <div class="screening-detail"><?= date("l j F g:i A ",strtotime($sessions[0]['time']))?></div>
					            <div class="screening-detail"><?= $sessions[0]['venue']?></div>
					            <?php 
								if($film['competition_session'] > 0) {
								?>
					                <div class="viewsession-text" style="margin-top:30px" id="viewsession">
					                    <? echo '<a style="text-decoration:none;" href="'.base_url().'advancesearch/session/'.$film['competition_session'].'">Back to Session '.$film['competition_session'].'</a>';
					                    ?>
					                </div>
					            <?
								}
								?>
								<div></div>
                                
                                <?php if($film['type'] != 1 && $film['type'] != 3 ) { ?>
								<div style="height:20px;"></div>
					            <div class="button-buy-ticket">
					    			Buy Tickets To Session <?=$film['competition_session']?> 
					    		</div>
                                <? } ?>
				    		</div>
				    	</div>
				    	
				    	
				    	
						<!-- <div style="margin-top:35px">
					        <span style="cursor: pointer" class="back" onclick="history.back()">
					        	Back
					        </span>
					    </div> -->
				    </div>
				</div>
			</div>
			<div class="col-sm-3">
				<?=$this->load->view('stk/common/right');?>
			</div>
		</div>
	</div>	
    
	<div style="clear:both;height: 30px;"></div>
</div>