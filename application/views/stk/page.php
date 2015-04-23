<div class="container">
	<div class="col-md-8 x-l-gutter">
    	<div class="cms-body">
    		<?php echo $page['content'];?>
            
            <?php
				if(isset($films)){
					$this->load->view('stk/page_film_view',array('films' => $films));	
				}
			?>
        </div>
    </div>
    
    
	<div class="col-md-4 x-r-gutter">
		<?=$this->load->view('stk/common/right');?>
	</div>
</div>


