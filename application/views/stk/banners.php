<?php $all = $this->news_sticker_model->get_published(); ?>    
<div id="banners" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        
            <?php
                $count = 0; 
                foreach($all as $alls){
            ?>
           
            <div class="item <?=!$count ? 'active' : '';?>">
                <a href="<?=$alls['url'] ? $alls['url'] : '#';?>">
                    <img src="<?=base_url().'photos/news_sticker/'.$alls['image'];?>" />
                    <div class="carousel-caption">
                        <h1><?=$alls['subheading'];?></h1>
                        <h4 class="hidden-xs"><?=$alls['description']?></h4>
                    </div>
                </a>
            </div>
           
            <?php $count++;} ?>
            
        </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#banners" role="button" data-slide="prev">
            <span class="slide-btn"><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="#banners" role="button" data-slide="next">
            <span class="slide-btn"><i class="fa fa-angle-right"></i></span>
        </a>
</div>