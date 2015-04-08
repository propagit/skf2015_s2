<script type="text/javascript">
function isValidEmailAddress(emailAddress) {
var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
return pattern.test(emailAddress);
}

function validate() {
	var valid = true;
	if($('#name').val() == "") { $('#errorName').html('Please enter your name'); valid = false; }
	else { $('#errorName').html(''); }
	
	if(!isValidEmailAddress($('#email').val()) || $('#email').val() == '') {  $('#errorEmail').html('Please enter a valid email');valid = false; }
	else { $('#errorEmail').html('');}
	
	if(!isValidEmailAddress($('#confirmemail').val()) || $('#confirmemail').val() == '') 
	{  
	  $('#errorConfirmEmail').html('Please enter a valid email');
	  valid = false; 
	}
	else 
	{ 
	  if($('#email').val() != $('#confirmemail').val()) 
	  {  
	    $('#errorConfirmEmail').html('Email does not match');
	    valid = false; 
	  }
	  else
	  {
	  $('#errorConfirmEmail').html(''); 
	  }
	}
	var checked = $('#over18').is(':checked');
	if(!checked)
	{
		 $('#errorOver18').html('Please confirm you are over 18 years of age');
		valid = false;
	}
	
	if (valid) {
		
		document.competitionForm.submit();
	}
}
</script>
<div id="pagecontent">
   <div id="left-container">
      <div style="min-height:1278px;background:#211d70;margin-top:15px; padding:15px;font-family:Gudea; color:#fff; font-size:14px;">
      <h2>THE ULTIMATE ST KILDA FILM FESTIVAL PRIZE PACK</h2>
       <br/>
      <p>ENTER HERE FOR YOUR CHANCE TO WIN</p><br/>
      <? if($this->session->flashdata('error_email_exist'))
		 {
			echo '<span style="color:#EE412F;">'.$this->session->flashdata('error_email_exist').'</span>';
		 }
		 if($this->session->flashdata('enter_ok'))
		 {
			echo '<span style="color:#EE412F;">'.$this->session->flashdata('enter_ok').'</span>';
		 }
		 ?>
      <form id="competitionForm" name="competitionForm" method="post" action="<?=base_url()?>enter_competition">
      <input type="hidden" name="browser" value="<?=$this->uri->uri_string()?>" />
			<table cellpadding="0" cellspacing="0" border="0">
            	<tr height="50">
                	<td width="100">Name *</td>
                    <td width="280"><input type="text" id="name" name="name" style="width:300px;padding-left:5px" /></td>	
                    <td><span id="errorName"  style="color:#EE412F;">
		<? if($this->session->flashdata('error_name'))
		 {
			echo $this->session->flashdata('error_name');
		 }
		 ?></span></td>	                    
                </tr>
            	<tr height="50">
                	<td width="100">Mobile</td>
                    <td width="280"><input type="text" id="mobile" name="mobile" style="width:300px;padding-left:5px"/></td>	
                    <td></td>	                    
                </tr>
            	<tr height="50">
                	<td width="100">Email *</td>
                    <td width="280"><input type="text" id="email" name="email" style="width:300px;padding-left:5px"/></td>	
                    <td><span id="errorEmail" style="color:#EE412F;"><? if($this->session->flashdata('error_email'))
		 {
			echo $this->session->flashdata('error_email');
		 }
		 ?></span></td>	                    
                </tr>
            	<tr height="50">
                	<td width="100">Confirm Email *</td>
                    <td width="280"><input type="text" id="confirmemail" name="confirmemail" style="width:300px; padding-left:5px"/></td>	
                    <td><span id="errorConfirmEmail" style="color:#EE412F;"></span></td>	                    
                </tr>                
            </table>
            <table cellpadding="0" cellspacing="0" border="0">
            	<tr height="40">
                	<td width="100">
                    	<input type="checkbox"  name="receive_email_stkildafilm" value="Yes" checked="checked" />
                        
                    </td>
                    <td>Tick here if you'd like to receive email updates from St Kilda Film Festival</td>	
                </tr>
                <tr height="40">
                    <td width="100">
                        <input type="checkbox"  name="receive_email_contributors" value="Yes" checked="checked" />
                    </td>
                    <td>Tick here if you'd like to receive emails updates from St Kilda Film Festival partners</td>	
                </tr>  
                                                     
            </table>   
            <table cellpadding="0" cellspacing="0" border="0">
             <tr height="40">
                    <td width="100">
                        <input type="checkbox"  name="over18" id="over18" value="Yes" checked="checked" />
                    </td>
                    <td width="280">I confirm that I am over 18 years of age</td>	
                     <td><span id="errorOver18" style="color:#EE412F;"></span></td>
                </tr>  
            </table>        		             
            <br/>
            <input onclick="validate();" type="button" name="enter" value="Enter Here" />
            <br/><br/>
         </form>
         <a href="<?=base_url()?>page-116/Terms-and-Conditions-Privacy-Policy">Terms and Conditions/ Privacy Policy</a><br/><br/>
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
       <div style="border-top: 1px solid #EE412F;height:1px;clear:both;margin-top:15px;"></div>
       <?
	   }
	   ?>
    <div class="film" <? if($counter%3==0) { echo 'style="margin-right:0px"';}?>>
        <div class="photo">
        	<a href="<?=base_url()?>details/<?=$film['id']?>">
			<?php if($film['small_image'] != "") { ?>
            <img src="<?=base_url()?>uploads/films/<?=$film['small_image']?>" width="221px" height="150px" />
            <?php } else { ?>
            <img src="<?=base_url()?>img/noimage.png"  width="221px" height="150px"/>
            <?php } ?>
            </a>
        </div>
        <div class="text">
        	<div class="brief">
            	<div class="title"><?=$film['title']?></div>
            	<div class="description">
					<?php 
						$text = $film['synopsis'];
						if (strlen($text) > 160) {
							$text = substr($text,0,155).'...';
						}
						print $text;
					?>
                </div>
            </div>
            <div class="more" style="text-transform:uppercase">
            
            	 <?php if ($film['country'] != "") { ?>
                <p><span><strong>Country</strong></span> 
                	<?php
					$country = $film['country'];
						if (strlen($country) > 18) { $country = substr($country,0,18).'...'; }
						print $country;                        
                } ?>
                </p>
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
                <p><span><strong>Artist</strong></span> 
                	<?php
					$artist = $film['artist'];
						if (strlen($artist) > 18) { $artist = substr($artist,0,18).'...'; }
						print $artist;                        
                } ?>
                </p>
                
				<?php if ($genre != "") { ?>
                <p><span><strong>Genre</strong></span> <?=$genre?></p>
                <?php } ?>
                
                <?php if ($film['director'] != "") { ?>
                <p><span><strong>Director</strong></span> 
					<?php
                    	$director = $film['director'];
						if (strlen($director) > 16) { $director = substr($director,0,16).'...'; }
						print $director;
					?>
                </p>
                <?php } ?>
                
				<?php if ($film['producer'] != "") { ?>
                <p><span><strong>Producer</strong></span> 
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
            	<br /><h4><a style="color:#6cb8d4" href="<?=base_url()?>details/<?=$film['id']?>">READ MORE</a></h4>
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
    
     <div style="clear:both"></div>
    </div>
      <div id="sponsors"><div style="padding-top:15px;margin:0 auto"><img src="<?=base_url()?>img/NewFooter.jpg" alt="Sponsors" border="0" usemap="#Map"  width="704" height="98"/><map name="Map" id="Map">
  <area shape="rect" coords="0,1,102,98" href="http://www.portphillip.vic.gov.au/" target="_blank" />
  <area shape="rect" coords="122,1,297,98" href="http://www.screenaustralia.gov.au/" target="_blank" />
  <area shape="rect" coords="300,1,528,102" href="http://film.vic.gov.au/www/html/7-home-page.asp" target="_blank" />
  <area shape="rect" coords="546,1,714,97" href="http://www.simplyenergy.com.au/movie/" target="_blank" />
</map></div>
      </div>
   </div>
            
