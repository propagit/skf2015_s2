<?php $all = $this->news_sticker_model->get_published(); ?>    
<div id="banners" class="carousel slide" data-ride="carousel" data-interval="false">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        
          
            <!-- trailer embeded from youtube-->
            <div class="item active">
               <div class="app-iframe">
                  <iframe width="100%" height="auto" src="https://www.youtube.com/embed/77N11sAHJgI" frameborder="0" allowfullscreen></iframe>
               </div>
            </div>
            <?php
                foreach($all as $alls){
            ?>
            <!-- rest of the banners -->
            <div class="item">
               <a href="<?=$alls['url'] ? $alls['url'] : '#';?>" target="_blank">
                    <img src="<?=base_url().'photos/news_sticker/'.$alls['image'];?>" />
                    <div class="carousel-caption">
                        <h1><?=$alls['subheading'];?></h1>
                        <h4 class="hidden-xs"><?=$alls['description']?></h4>
                    </div>
                </a>
    
            </div>
            <?php } ?>
           
            
        </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#banners" role="button" data-slide="prev">
            <span class="slide-btn"><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="#banners" role="button" data-slide="next">
            <span class="slide-btn"><i class="fa fa-angle-right"></i></span>
        </a>
</div>