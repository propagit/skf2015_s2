<style>
.img-no-bootstrap
{
	width: inherit !important;
}
</style>
<div id="purple-container">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-9">
				<div style="height:20px;"></div>
				
				<div class="row">
					<div class="col-sm-12" id="page-content">
				    	<a name="content">&nbsp;</a>
						<? echo $page['content'];?>
                    </div>
                </div>
                <div class="row">     
						  <?php
                        $counter =1;
                        
                        
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
                           <? if($counter %3 == 1) { ?>
                            <div style="clear:both"></div>
                           <div style="border-top: 2px solid #404040;height:1px;clear:both;margin-top:20px;margin-bottom:15px;"></div>
                           <?
                           }
                           ?>
                        <div class="film col-sm-4" <? if($counter%3==0) { echo 'style="margin-right:0px"';}?>>
                            <div class="photo">
                                <a href="<?=base_url()?>details/<?=$film['id']?>">
                                <?php if($film['large_image'] != "") { ?>
                                <img src="<?=base_url()?>uploads/films/<?=$film['large_image']?>" width="100%" />
                                <?php } else { ?>
                                <img src="<?=base_url()?>img/noimage.png"  width="225px" height="150px"/>
                                <?php } ?>
                                </a>
                            </div>
                            <div class="text intro" style="margin-top:25px;" >
                                <div class="brief">
                                    <div class="title">
                                        <!--
                                        <? //if($this->session->userdata('session')){ ?><span style="color:#B8E3F1"><?=$film['order']?>.</span> <? //}?>
                                        -->
                                        <h2><?=$film['title']?></h2></div>
                                    <div class="description" style="margin-top:23px;">
                                        <?php 
                                            $text = $film['synopsis'];
                                            if (strlen($text) > 160) {
                                                $text = substr($text,0,155).'...';
                                            }
                                            print $text;
                                        ?>
                                    </div>
                                </div>
                                <!--<div class="more" style="text-transform:uppercase">-->
                                <div class="intro" style="margin-top:20px;" >
                                <?php 
                                    /*
                                   if ($film['country'] != "") { ?>
                                    <p><span><strong>Country</strong></span> 
                                        <?php
                                        $country = $film['country'];
                                            if (strlen($country) > 18) { $country = substr($country,0,18).'...'; }
                                            print $country;                        
                                    } ?>
                                    </p>
                                    */?>
                                    <p>
                                        <b><?=$film['year']?>
                                        <?php if($film['format'] != "") { ?>
                                        / <?=$film['format']?>
                                        <?php } ?>
                                        
                                        <?php if ($film['running_time'] != "") { ?>
                                        / <?=$film['running_time']?>
                                        <?php } ?>
                                        </b>
                                    </p>
                                    
                                    <?php if ($film['artist'] != "") { ?>
                                    <p><span class="bold">Artist</span> 
                                        <?php
                                        $artist = $film['artist'];
                                            if (strlen($artist) > 18) { $artist = substr($artist,0,18).'...'; }
                                            print $artist;                        
                                    } ?>
                                    </p>
                                    
                                    <?php if ($genre != "") { ?>
                                    <p><span class="bold">Genre</span> <?=$genre?></p>
                                    <?php } ?>
                                    
                                    <?php if ($film['director'] != "") { ?>
                                    <p><span class="bold">Director</span> 
                                        <?php
                                            $director = $film['director'];
                                            if (strlen($director) > 16) { $director = substr($director,0,16).'...'; }
                                            print $director;
                                        ?>
                                    </p>
                                    <?php } ?>
                                    
                                    <?php if ($film['producer'] != "") { ?>
                                    <p><span class="bold">Producer</span> 
                                        <?php 
                                            $producer = $film['producer']; 
                                            if (strlen($producer) > 15) { $producer = substr($producer,0,15).'...'; }
                                            print $producer;
                                        ?>
                                    </p>
                                    <?php } ?>
                                    <?php 
                                    
                                    if ($film['type'] > 0) 
                                    { 
                                    
                                    ?>
                                    <span class="readmore"><a href="<?=base_url()?>details/<?=$film['id']?>">Read more</a></span>
                                    <?php 
                                    } 
                                    else { 
                                    
                                    ?><br /><?php } ?>
                                </div>
                            </div>
                        </div>
                            
                        <?php  
                           $counter++; 
                        } 
                        ?>
                        
                        
                        
                        
                        
                        
				    
				</div>
			</div>
			<div class="col-sm-3">
				<?=$this->load->view('stk/common/right');?>
			</div>
		</div>
	</div>	
	<div style="height: 30px;"></div>
</div>