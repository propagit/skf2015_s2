<div class="container">
	<div class="col-md-8 x-l-gutter">
    	<div class="cms-body search-results">       
        
            <?php if(count($films)){ ?>
                <h1><?=$heading?></h1>
                <span class="viewer-discreation text-danger"><?=$session_warning ? 'This session contains content that may cause distress to some viewers. Viewer discretion is advised.' : '';?></span>
                <?php echo $pages;?>
                
                <?php
					# display sessions if available
					if($address != '' && isset($address)){
						if($event){
				?>
                <div class="col-xs-12 x-gutters sessions-wrap">
                	<div class="col-md-8">
                        <h2><?=date('l d F',strtotime($event['date'])) . ', ' . $event['time']; ?></h2>
                        <h2><?=$event['venue'];?></h2>
                    </div>
                    <div class="col-md-4">
                    	<div class="nav-sessions x-gutters col-xs-12">
                    		<span class="previous"><?=$previous?></span>
                        	<span class="next"><?=$next?></span>
                        </div>
	        			
                        <? if($heading != "SEARCH RESULTS"){ ?>
                            <a target="_blank" href="<?=$event['ticket_link'];?>"><div class="btn btn-buy pull">Buy Tickets</div></a>
                        <? } ?>
                    </div>
                </div>
                <?php	
						}
					}
				?>
                
                
                <?php
                    $row_counter = 0;
                    foreach($films as $film){
                        $genres = $this->film_model->get_film_genres($film['id']); 
                        $genre = $genres ? implode('/', array_column($genres, 'name')) : '';
                ?>
                    <div class="col-md-6 search-block">
                        <a href="<?=base_url()?>details/<?=$film['id']?>">
                            <img src="<?=base_url() . ($film['large_image'] ? "uploads/films/" . $film['large_image'] : "img/noimage.png")?>" width="100%" />   
                        </a>
                        <h3><?=$film['title'];?></h3>
                        <span class="genre"><?=$genre;?></span>
                        <span class="running-time"><?=$film['running_time'] ? $film['running_time'] : '';?></span>
                        <span class="format"><?=$film['format'] ? $film['format'] : '';?></span>
                        <span class="year"><?=$film['year'] ? ',' . $film['year'] : '';?></span>
                        <p class="synopsis"><?=substr($film['synopsis'],0,120) . '...';?></p>
                        
                        <ul class="credits">
                            <li><strong>Director </strong><?=$film['director'] ? $film['director'] : ' NA ';?></li>
                            <li><strong>Producer </strong><?=$film['producer'] ? $film['producer'] : ' NA ';?></li>
                            <li><strong>Screenwriter </strong><?=$film['screen_writer'] ? $film['screen_writer'] : ' NA ';?></li>
                            <li><strong>DOP </strong><?=$film['photography_director'] ? $film['photography_director'] : ' NA ';?></li>
                        </ul>
                        
                        <a class="more-info" href="<?=base_url();?>details/<?=$film['id'];?>">More info</a>
                        <hr class="hidden-lg hidden-md">
                    </div>
                <?php
                        echo ($row_counter % 2) ? '<div class="new-row hidden-sm hidden-xs"><hr></div>' : '';
                        $row_counter++;
                    }
                ?>
            <?php echo $pages;?>
            <?php }else{  # no films found - show no results found message ?>
            <h1>No Results Found</h1>
            <?php } ?>
    		
        </div>
    </div>
    
    
	<div class="col-md-4 x-r-gutter">
		<?=$this->load->view('stk/common/right');?>
	</div>
</div>
