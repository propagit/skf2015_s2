<div class="container">
	
	<div class="col-md-8 x-l-gutter">
		<?php $this->load->view('stk/banners');?>
        
        <div class="tiles">
        	<a href="<?=base_url();?>">
            <div class="col-md-6 col-xs-12 x-l-gutter tile">
                <img src="<?=base_url();?>frontend-assets/img/program-banner.jpg" alt="program-banner.jpg" title="Program Banner" />
                <div class="tile-caption">
                    <h1>View The Program</h1>
                </div>
            </div>
            </a>
            
            <a href="<?=base_url();?>">
            <div class="col-md-6 col-xs-12 x-r-gutter tile">
                <img src="<?=base_url();?>frontend-assets/img/filmmaker-development.jpg" alt="filmmaker-development.jpg" title="Film Maker Development Banner" />
                <div class="tile-caption">
                    <h1>Filmmaker Development</h1>
                </div>
            </div>
            </a>
        
        
            <a href="<?=base_url();?>page-265/top-100-short-films">
            <div class="col-md-6 col-xs-12 x-l-gutter tile">
                <img src="<?=base_url();?>frontend-assets/img/top-100-banner.jpg" alt="top-100-banner.jpg" title="Top 100 Banner" />
                <div class="tile-caption">
                    <h1>Top 100 Short Films</h1>
                </div>
            </div>
            </a>
            
            <a href="<?=base_url();?>page-269/soundkilda">
            <div class="col-md-6 col-xs-12 x-r-gutter tile">
                <img src="<?=base_url();?>frontend-assets/img/sound-kilda-banner.jpg" alt="sound-kilda-banner.jpg" title="SoundKilda Banner" />
                <div class="tile-caption">
                    <h1>SoundKilda</h1>
                </div>
            </div>
            </a>
        </div>
        
	</div>
    <div class="col-md-4 x-r-gutter hidden-xs">
        <?php $this->load->view('stk/common/right');?>    
    </div>
    
    <div class="col-md-4 x-r-gutter visible-xs">
        <?php $this->load->view('stk/common/right');?>    
    </div>
</div>