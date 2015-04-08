<div id="purple-container">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-9">
				<div style="height:20px;"></div>
				<div class="row">
					<div class="col-sm-12">
				    	<div class="content-title"><h1><?=$heading?></h1></div>   	
				    	<div class="leftside">
				    		<? if($address !='' && isset($address)){?>
					        <div class="film-date"><span class="subheading3">
					        	<?php if($heading == 'TOP 100 SESSION 1'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E345D3FE"; ?>
					        		FRIDAY 23 MAY, 6PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 2'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E345D401"; ?>
					        		FRIDAY 23 MAY, 7:45PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 3'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E346D404"; ?>
					        		FRIDAY 23 MAY, 9:30PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 4'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E347D40C"; ?>
					        		SATURDAY 24 MAY, 7:15PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 5'){ $buy_link = "http://www.ticketmaster.com.au/skff-australias-top-100-session-st-kilda-victoria-25-05-2014/event/13004C92E349D41D"; ?>
					        		SUNDAY 25 MAY, 4:00PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 6'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E349D423"; ?>
					        		SUNDAY 25 MAY, 5:45PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 7'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E34AD42D"; ?>
					        		TUESDAY 27 MAY, 6:30PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 8'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E34BD42F"; ?>
					        		TUESDAY 27 MAY, 8:15PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 9'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E34CD43B"; ?>
					        		WEDNESDAY 28 MAY, 7:45PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 10'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E34DD43F"; ?>
					        		THURSDAY 29 MAY, 6:30PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 11'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E34ED447"; ?>
					        		FRIDAY 30 MAY, 8:15PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 12'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E34FD44E"; ?>
					        		FRIDAY 30 MAY, 10:00PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 13'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E350D455"; ?>
					        		SATURDAY 31 MAY,  3:00PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php if($heading == 'TOP 100 SESSION 14'){ $buy_link = "http://www.ticketmaster.com.au/event/13004C92E350D459"; ?>
					        		SATURDAY 31 MAY,  4:45PM<br/>
					        		THE ASTOR THEATRE
					        	<?php }?>
					        	<?php //$address?>
					        </span></div>
					        <!-- <div class="date"><span class="subheading3"><?=$heading2?></span></div>     -->   
					        <? }?>
				    	</div>
                        <? if(count($films)>0){?>
				    	<div class="rightside">
				    		
                            <div class="nav" style="float: right; text-align: right"><?=$next?></div>
	        				<div class="nav" style="margin-right:30px; float: right"><?=$previous?></div>
                            <? if($next!='' || $previous!=''){?> <div style="height:10px; clear:both;"></div> <? }?>
                            <? if($heading != "SEARCH RESULTS"){ ?>
                                <a target="_blank" href="<?=$buy_link;?>"><div class="button-buy-ticket" style="float:left;">
                                    Buy Tickets
                                </div>
                                </a>
                            <? } ?>
				    	</div>
                        <? } else{?>
                        	<div class="clearside"></div>	
                            <span class="subheading3" style="float:left;">NO RESULTS FOUND</span>
                        <? } ?>
				    	<div class="clearside" style="height: 20px;"></div>
                        
				    </div>
				</div>
				<?
				if(count($films)>0){
				
					$counter = 1;
					foreach($films as $film) 
					{ 
						$genres = $this->film_model->get_film_genres($film['id']); 
						$genre = '';
						if ($genres) {
							$genre = $genres[0]['name'];
							for($i=1;$i<count($genres);$i++) { 
								$genre .= ', '.$genres[$i]['name'];
							} 
						}
						
						?>
						
						<?
						if($counter % 3 == 1)
						{
							//opening
							?>
							<div class="row">
								<div class="col-sm-4">
									<div class="right-gray-line">&nbsp;</div> 
									<div class="gap-movie"></div>
									<!-- image -->
									<a href="<?=base_url()?>details/<?=$film['id']?>">
									<?php if($film['large_image'] != "") { ?>
									<img src="<?=base_url()?>uploads/films/<?=$film['large_image']?>" width="100%" />
									<?php } else { ?>
									<img src="<?=base_url()?>img/noimage.png"  width="100%"/>
									<?php } ?>
									</a>
									<!-- image -->
									<div class="gap-movie"></div>
									<div class="session-wrap">
										<div class="session-film-title"><?=$film['title']?></div>
										<div class="session-description">
											<?php 
												$text = $film['synopsis'];
												if (strlen($text) > 160) {
													$text = substr($text,0,155).'...';
												}
												print $text;
											?>
										</div>
										<div class="session-description">
											<?=$film['year']?>
											<?php if($film['format'] != "") { ?>
											/ <?=$film['format']?>
											<?php } ?>
											
											<?php if ($film['running_time'] != "") { ?>
											/ <?=$film['running_time']?>
											<?php } ?>
											
											<br/>
											<?php if ($film['artist'] != "") { ?>
											<span>Artist</span> 
												<?php
												$artist = $film['artist'];
													if (strlen($artist) > 18) { $artist = substr($artist,0,18).'...'; }
													print $artist;  
												?>
												<br/>
												<?                      
											} ?>
											
											<?php if ($genre != "") { ?>
											<span>Genre</span> <?=$genre?>
											<?php } ?>
											<br/>
											<?php if ($film['director'] != "") { ?>
											<span>Director</span> 
												<?php
													$director = $film['director'];
													if (strlen($director) > 16) { $director = substr($director,0,16).'...'; }
													print $director;
												?>
												<br/>
											
											<?php } ?>
											
											<?php if ($film['producer'] != "") { ?>
											<span>Producer</span> 
												<?php 
													$producer = $film['producer']; 
													if (strlen($producer) > 15) { $producer = substr($producer,0,15).'...'; }
													print $producer;
												?>
												<br/>
											<?php } ?>
										</div>
                                        
                                        <div class="session-description">
											<span class="readmore"><a href="<?=base_url()?>details/<?=$film['id']?>">More Info</a></span>
										</div>
                                        
									</div>
									
									
								</div>
							<?
						}
						elseif($counter % 3 == 0)
						{
							//closing
							?>
								<div class="col-sm-4">
									<div class="right-gray-line">&nbsp;</div>
									<div class="gap-movie"></div>  
									<!-- image -->
									<a href="<?=base_url()?>details/<?=$film['id']?>">
									<?php if($film['large_image'] != "") { ?>
									<img src="<?=base_url()?>uploads/films/<?=$film['large_image']?>" width="100%" />
									<?php } else { ?>
									<img src="<?=base_url()?>img/noimage.png"  width="100%"/>
									<?php } ?>
									</a>
									<!-- image -->
									<div class="gap-movie"></div>
									<div class="session-wrap">
										<div class="session-film-title"><?=$film['title']?></div>
										<div class="session-description">
											<?php 
												$text = $film['synopsis'];
												if (strlen($text) > 160) {
													$text = substr($text,0,155).'...';
												}
												print $text;
											?>
										</div>
										<div class="session-description">
											<?=$film['year']?>
											<?php if($film['format'] != "") { ?>
											/ <?=$film['format']?>
											<?php } ?>
											
											<?php if ($film['running_time'] != "") { ?>
											/ <?=$film['running_time']?>
											<?php } ?>
											
											<br/>
											<?php if ($film['artist'] != "") { ?>
											<span>Artist</span> 
												<?php
												$artist = $film['artist'];
													if (strlen($artist) > 18) { $artist = substr($artist,0,18).'...'; }
													print $artist;  
												?>
												<br/>
												<?                      
											} ?>
											
											<?php if ($genre != "") { ?>
											<span>Genre</span> <?=$genre?>
											<?php } ?>
											<br/>
											<?php if ($film['director'] != "") { ?>
											<span>Director</span> 
												<?php
													$director = $film['director'];
													if (strlen($director) > 16) { $director = substr($director,0,16).'...'; }
													print $director;
												?>
												<br/>
											
											<?php } ?>
											
											<?php if ($film['producer'] != "") { ?>
											<span>Producer</span> 
												<?php 
													$producer = $film['producer']; 
													if (strlen($producer) > 15) { $producer = substr($producer,0,15).'...'; }
													print $producer;
												?>
												<br/>
											<?php } ?>
										</div>
                                        
                                        <div class="session-description">
											<span class="readmore"><a href="<?=base_url()?>details/<?=$film['id']?>">More Info</a></span>
										</div>
									</div>
									
								</div>
							</div>
							<?
						}
						else 
						{
							//middle
							?>
								<div class="col-sm-4">
									<div class="right-gray-line">&nbsp;</div>
									<div class="gap-movie"></div>  
									<!-- image -->
									<a href="<?=base_url()?>details/<?=$film['id']?>">
									<?php if($film['large_image'] != "") { ?>
									<img src="<?=base_url()?>uploads/films/<?=$film['large_image']?>" width="100%" />
									<?php } else { ?>
									<img src="<?=base_url()?>img/noimage.png"  width="100%"/>
									<?php } ?>
									</a>
									<!-- image -->
									<div class="gap-movie"></div>
									<div class="session-wrap">
										<div class="session-film-title"><?=$film['title']?></div>
										<div class="session-description">
											<?php 
												$text = $film['synopsis'];
												if (strlen($text) > 160) {
													$text = substr($text,0,155).'...';
												}
												print $text;
											?>
										</div>
										<div class="session-description">
											<?=$film['year']?>
											<?php if($film['format'] != "") { ?>
											/ <?=$film['format']?>
											<?php } ?>
											
											<?php if ($film['running_time'] != "") { ?>
											/ <?=$film['running_time']?>
											<?php } ?>
											
											<br/>
											<?php if ($film['artist'] != "") { ?>
											<span>Artist</span> 
												<?php
												$artist = $film['artist'];
													if (strlen($artist) > 18) { $artist = substr($artist,0,18).'...'; }
													print $artist;  
												?>
												<br/>
												<?                      
											} ?>
											
											<?php if ($genre != "") { ?>
											<span>Genre</span> <?=$genre?>
											<?php } ?>
											<br/>
											<?php if ($film['director'] != "") { ?>
											<span>Director</span> 
												<?php
													$director = $film['director'];
													if (strlen($director) > 16) { $director = substr($director,0,16).'...'; }
													print $director;
												?>
												<br/>
											
											<?php } ?>
											
											<?php if ($film['producer'] != "") { ?>
											<span>Producer</span> 
												<?php 
													$producer = $film['producer']; 
													if (strlen($producer) > 15) { $producer = substr($producer,0,15).'...'; }
													print $producer;
												?>
												<br/>
											<?php } ?>
										</div>
                                        
                                        <div class="session-description">
											<span class="readmore"><a href="<?=base_url()?>details/<?=$film['id']?>">More Info</a></span>
										</div>
                                        
									</div>
									
									
								</div>
							
							<?
						}
						?>
					   
						
					<?php  
					   $counter++; 
					} 
					
					if(($counter - 1) % 3 == 0)
					{
						
					}
					else
					{
					?>
						</div>
					<?
					}
				
				}
			
				?>
				
			</div>
			<div class="col-sm-3">
				<?=$this->load->view('stk/common/right');?>
			</div>
		</div>
	</div>	
	<div style="height: 30px;"></div>
</div>