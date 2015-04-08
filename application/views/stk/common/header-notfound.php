<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/template.css"> 
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/stk.css">

<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/navigation.css"> 
<!--[if IE]>
<link rel='stylesheet' type='text/css' href='<?=base_url()?>css/iefixed.css' />
<![endif]--> 
<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/AC_RunActiveContent.js">
</script>
<title>St Kilda Film &middot; Page not found</title>


</head>

<body>
<div id="wrap-all">
 <div id="pgwrap">
   <div id="header">
     <a href="<?=base_url()?>"><img src="<?=base_url()?>img/Header.jpg" /></a>
   </div>
   <div id="bodier">
     <div id="nav">
        <ul id="navmenu-h">
          <?php foreach($links as $link) { 
				$child = $this->menu_model->get_child_links($link['id']); 
				$current = '';
				if ($this->uri->segment(1).'/'.$this->uri->segment(2) == $link['url']) 
				{
					$current = ' class="current"';
				}
				?>
            	
                <li><a href="<?=base_url()?><?=$link['url']?>"<?=$current?>><? if($link['id'] == 1) { ?><img alt="ABOUT" src="<?=base_url()?>img/nav/Nav-About.png"/><? } ?>
                <? if($link['id'] == 2) { ?><img alt="INFORMATION" src="<?=base_url()?>img/nav/Nav-Information.png"/><? } ?>
                <? if($link['id'] == 3) { ?><img alt="FILMS" src="<?=base_url()?>img/nav/Nav-Films.png"/><? } ?>
                <? if($link['id'] == 4) { ?><img alt="EVENTS" src="<?=base_url()?>img/nav/Nav-Events.png"/><? } ?>
                <? if($link['id'] == 5) { ?><img alt="TICKETS" src="<?=base_url()?>img/nav/Nav-Tickets.png"/><? } ?>
                <? if($link['id'] == 6) { ?><img alt="PLANNER" src="<?=base_url()?>img/nav/Nav-Planner.png"/><? } ?>
                <? if($link['id'] == 7) { ?><img alt="FILMMAKER DEVELOPMENT" src="<?=base_url()?>img/nav/Nav-FilmDev.png"/><? } ?>
                <? if($link['id'] == 8) { ?><img alt="TOURING" src="<?=base_url()?>img/nav/Nav-Touring.png"/><? } ?>
                </a>
                  <? if($child != NULL)
				   {
				  ?>
                	<ul <? if($link['id'] == 1) { echo 'class="about"';}?>>
                    <?php foreach($child as $link) 
					{ 
						$current = '';
						if ($this->uri->segment(1).'/'.$this->uri->segment(2) == $link['url']) 
						{
							$current = ' class="current"';
						} 
					?>
                    	<li><a href="<?=base_url()?><?=$link['url']?>"<?=$current?>><?=$link['name']?></a></li>
                   
                   
                    
                     <?php
					  }
					  ?>
                       </ul>
                       <?
					 } 
					 ?>
                </li>
               
            <?php } ?>
          
         
        </ul>
     </div>