<?php
	$links = $this->menu_model->get_links(1,0);
?>

	<ul class="nav navbar-nav hidden-xs">
		<?php 
            $i=0;
            foreach($links as $link) {
                $active = ''; 
                # check if this is the current link
                $child = $this->menu_model->get_child_links($link['id']); 
                if ($this->uri->segment(1).'/'.$this->uri->segment(2) == $link['url']) {
                    $active = 'active';
                }
                if (!$child) { 
        ?>
                    <li><a class="<?=$active;?>" href="<?=base_url()?><?=$link['url']?>"><?=$link['name']?></a></li>
        <?php 
                } else{
                    # check active link
                    foreach($child as $clink){
                        if(base_url().$this->uri->uri_string() == base_url().$clink['url']){
                            $active = 'active';
                        }
                    }
        ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle <?=$active;?>" data-toggle="dropdown"><?=$link['name']?></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                                foreach($child as $childlink) {	
                                    $sub_nav_active = '';
                                    if($childlink['url'] == base_url()){	
                            ?>
                                        <li> <a href="<?=$childlink['url']?>"><?=$childlink['name']?></a></li>
                            <?php
                                    }else{
                                        if(base_url().$this->uri->uri_string() == base_url().$childlink['url']){
                                            $sub_nav_active = 'sub-nav-active';
                                        }
                            ?>
                                        <li class="<?=$sub_nav_active;?>"><a href="<?=base_url()?><?=$childlink['url']?>"><?=$childlink['name']?></a></li>
                            <?php	
                                    }
                                } # foreach($child as ...)
                            ?>
                        </ul>
                    </li>
        
        <?php 			
                } # if (!$child)
            } # foreach($links as $link)
        ?>		
    
    </ul>
    
    
    <!-- mobile nav -->
    
    <div class="mob-nav visible-xs">
        <button class="btn btn-navbar pull" data-target=".nav-collapse" data-toggle="collapse" type="button">
           MENU
        </button>
        <div class="nav-collapse collapse push fw">
                <ul class="nav">
                    <?php 
                        $i=0;
                        foreach($links as $link) {  
                            $active = '';
							 # check if this is the current link
               				 $child = $this->menu_model->get_child_links($link['id']); 
                            if ($this->uri->segment(1).'/'.$this->uri->segment(2) == $link['url']) {
                                $active = 'active';
                            }
                            if (!$child) { 
                    ?>
                                <li><a class="<?=$active;?>" href="<?=base_url()?><?=$link['url']?>"><?=$link['name']?></a></li>
                    <?php 
                            } else{ 
                                # check active link
                                foreach($child as $clink){
                                    if(base_url().$this->uri->uri_string() == base_url().$clink['url']){
                                        $active = 'active';
                                    }
                                }
                            
                    ?>
                                <li class="dropdown mob-dd">
                                    <a href="#" class="dropdown-toggle <?=$active;?>" data-toggle="dropdown"><?=$link['name']?></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php
                                            foreach($child as $childlink) {	
                                                $sub_nav_active = '';
                                                if($childlink['url'] == base_url()){	
                                        ?>
                                                    <li> <a href="<?=$childlink['url']?>"><?=$childlink['name']?></a></li>
                                        <?php
                                                }else{
                                                    if(base_url().$this->uri->uri_string() == base_url().$childlink['url']){
                                                        $sub_nav_active = 'sub_nav_active';
                                                    }
                                        ?>
                                                    <li  class="<?=$sub_nav_active;?>"><a href="<?=base_url()?><?=$childlink['url']?>"><?=$childlink['name']?></a></li>
                                        <?php	
                                                }
                                            } # foreach($child as ...)
                                        ?>
                                    </ul>
                                </li>
                    
                    <?php 			
                            } # if (!$child)
                        } # foreach($links as $link)
                    ?>	                
            </ul>
        </div>
    
    </div><!--stk-mob-nav-->