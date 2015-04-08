<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="Stkilda Film Festival Melboure - Showcase of the best Australian & International Short Films">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>St Kilda Film Festival &middot; <? if(isset($page['title'])) { echo $page['title']; } ?><? if(isset($title)) { echo $title; } ?></title>


<?php if(ENVIRONMENT == 'development'){ ?>

<link rel="stylesheet" href="<?=base_url()?>frontend-assets/bootstrap-3.2.2/css/bootstrap.min.css">
<!-- FA -->
<link rel="stylesheet" href="<?=base_url()?>frontend-assets/font-awesome-4.3.0/css/font-awesome.min.css">
<?php }else{ ?>
    <!-- BS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- FA -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php } ?>


<!--timer-->
<link rel="stylesheet" href="<?=base_url()?>frontend-assets/js/jquery.countdown-2.0.2/jquery.countdown.css">

<!-- app css -->
<link rel="stylesheet" href="<?=base_url()?>frontend-assets/css/app.css">


<!-- Load Scripts -->

<?php if(ENVIRONMENT == 'development'){ ?>
<!-- jQuery -->
<script src="<?=base_url()?>frontend-assets/js/jquery-1.11.2.min.js"></script>
<!-- BSJS-->
<script src="<?=base_url()?>frontend-assets/bootstrap-3.2.2/js/bootstrap.min.js"></script>

<?php }else{ ?>  
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- BSJS-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<?php } ?>


<!--timer-->
<script src="<?=base_url()?>frontend-assets/js/jquery.countdown-2.0.2/jquery.plugin.min.js"></script>
<script src="<?=base_url()?>frontend-assets/js/jquery.countdown-2.0.2/jquery.countdown.min.js"></script>
<!--app.script.js-->
<script src="<?=base_url()?>frontend-assets/js/app.scripts.js"></script>


</head>

<body>
<div id="side-ladder" class="ladder-wrap hidden-xs">
    <div class="ladder1"></div>
    <div class="ladder2"></div>
    <div class="ladder3"></div>
    <div class="ladder4"></div>
</div>
<header>
	<div id="header">
    	<div class="container hidden-xs" id="app-container">
        	<div class="col-lg-12 col-md-12 col-sm-12 logo x-gutters">
                <a href="<?=base_url();?>"><img src="<?=base_url();?>frontend-assets/img/core/logo.png" title="St Kilda Flim Festival" alt="logo.png"></a>
                
                <div class="council-top-logo hidden-xs">
                	<img src="<?=base_url();?>frontend-assets/img/core/city-port-phillip-logo-top.png" title="St Kilda Flim Festival" alt="logo.png">
                </div>
            </div>
            
           
			<?php if(0){
                # client request to add one image instead of text, kept for reference or if we need to change it back to Text
            ?>
            <!--<div class="col-lg-4 col-md-4 col-sm-4 event x-gutters">
                <div class="col-xs-6 x-gutters">
                    <span class="date">
                        <span>
                            21 - 30<br>
                            May<br>
                            2015
                        </span>
                    </span>
                    <span class="featured  hidden-xs">
                        Australia's<br>
                        Top 100<br>
                        Short Films
                    </span>
                </div>
            </div>-->
            <?php } ?> 
        </div>
        
        <div class="visible-xs mob-header">
        	<a href="<?=base_url();?>"><img src="<?=base_url();?>frontend-assets/img/core/mob-header.png" title="St Kilda Flim Festival" alt="logo.png"></a>
        </div>
    </div>
</header> 
  
<nav id="top-nav">
    <div class="container">
        <?php $this->load->view('stk/common/nav');?>
    </div>
</nav>



