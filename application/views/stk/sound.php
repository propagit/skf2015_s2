<script type="text/javascript">
   $j(document).ready(function()
  {  
    $j("form#soundForm").submit(function() 
	{
		if($j("input[name='Song title']").val() == '' || $j("input[name='Song title']").val() == null)
		{
			alert('Please enter song title');
			$j("input[name='Song title']").focus();
			return false;
		}
		if($j("input[name='Artist band']").val() == '' || $j("input[name='Artist band']").val() == null)
		{
			alert('Please enter Artist band');
			$j("input[name='Artist band']").focus();
			return false;
		}
		if($j("input[name='Year Completed']").val() == '' || $j("input[name='Year Completed']").val() == null)
		{
			alert('Please enter Year Completed');
			$j("input[name='Year Completed']").focus();
			return false;
		}
		if($j("input[name='Film running mins']").val() == '' || $j("input[name='Film running mins']").val() == null)
		{
			alert('Please enter Film running mins');
			$j("input[name='Film running mins']").focus();
			return false;
		}
		if($j("input[name='Film running seconds']").val() == '' || $j("input[name='Film running seconds']").val() == null)
		{
			alert('Please enter Film running seconds');
			$j("input[name='Film running seconds']").focus();
			return false;
		}
		if($j("input[name='Producer']").val() == '' || $j("input[name='Producer']").val() == null)
		{
			alert('Please enter Producer');
			$j("input[name='Producer']").focus();
			return false;
		}
		if($j("input[name='Director']").val() == '' || $j("input[name='Director']").val() == null)
		{
			alert('Please enter Director');
			$j("input[name='Director']").focus();
			return false;
		}
		if($j("input[name='Screenwriter']").val() == '' || $j("input[name='Screenwriter']").val() == null)
		{
			alert('Please enter Screenwriter');
			$j("input[name='Screenwriter']").focus();
			return false;
		}
		if($j("#sypnosis").val() == '' || $j("#sypnosis").val() == null)
		{
			alert('Please enter sypnosis');
			$j("#sypnosis").focus();
			return false;
		}
		if($j("#publicity").val() == '' || $j("#publicity").val() == null)
		{
			alert('Please enter publicity');
			$j("#publicity").focus();
			return false;
		}
		if($j("input[name='Principal first name']").val() == '' || $j("input[name='Principal first name']").val() == null)
		{
			alert('Please enter Principal first name');
			$j("input[name='Principal first name']").focus();
			return false;
		}
		if($j("input[name='Principal last name']").val() == '' || $j("input[name='Principal last name']").val() == null)
		{
			alert('Please enter Principal last name');
			$j("input[name='Principal last name']").focus();
			return false;
		}
		if($j("input[name='Principal position']").val() == '' || $j("input[name='Principal position']").val() == null)
		{
			alert('Please enter Principal position');
			$j("input[name='Principal position']").focus();
			return false;
		}
		
		if($j("input[name='Principal address']").val() == '' || $j("input[name='Principal address']").val() == null)
		{
			alert('Please enter Principal address');
			$j("input[name='Principal address']").focus();
			return false;
		}
		if($j("input[name='Principal suburb']").val() == '' || $j("input[name='Principal suburb']").val() == null)
		{
			alert('Please enter Principal suburb');
			$j("input[name='Principal suburb']").focus();
			return false;
		}
		if($j("input[name='Principal postcode']").val() == '' || $j("input[name='Principal postcode']").val() == null)
		{
			alert('Please enter Principal postcode');
			$j("input[name='Principal postcode']").focus();
			return false;
		}
		if($j("input[name='Telephone business hours']").val() == '' || $j("input[name='Telephone business hours']").val() == null)
		{
			alert('Please enter Telephone business hours');
			$j("input[name='Telephone business hours']").focus();
			return false;
		}
		if($j("input[name='Telephone after hours']").val() == '' || $j("input[name='Telephone after hours']").val() == null)
		{
			alert('Please enter Telephone after hours');
			$j("input[name='Telephone after hours']").focus();
			return false;
		}
		if($j("input[name='email private']").val() == '' || $j("input[name='email private']").val() == null)
		{
			alert('Please enter email private');
			$j("input[name='email private']").focus();
			return false;
		}
		if($j("input[name='email public']").val() == '' || $j("input[name='email public']").val() == null)
		{
			alert('Please enter email public');
			$j("input[name='email public']").focus();
			return false;
		}
		if($j("input[name='return address']").val() == '' || $j("input[name='return address']").val() == null)
		{
			alert('Please enter return address');
			$j("input[name='return address']").focus();
			return false;
		}
		if($j("input[name='return suburb']").val() == '' || $j("input[name='return suburb']").val() == null)
		{
			alert('Please enter return suburb');
			$j("input[name='return suburb']").focus();
			return false;
		}
		if($j("input[name='return postcode']").val() == '' || $j("input[name='return postcode']").val() == null)
		{
			alert('Please enter return postcode');
			$j("input[name='return postcode']").focus();
			return false;
		}
		if(!$j("input[name='payment_option']:checked").val())
		{
			alert('Please choose your payment option');
			return false;
		}
	});  
  });
   function ratio_other()
   {
	   if($j('select#screening_ratio').val() == 'Other')
	   {
		   $j('#ratio_other').show();
	   }
	   else
	   {
		   $j('#ratio_other').hide();
	   }
   }
</script>
<div id="pagecontent">
   <div id="left-container">
      <div style="min-height:1278px">
      
    	<div class="orangeheader">SoundKILDA Entry Form</div>
        <p>This application needs to be completed in one sitting. We recommend you print out a copy of the form after completion and return it with all the relevant information. It is important that ALL the information you provide is correct and up to date.<br/></p>
        <p>&nbsp;</p>
        <p><strong>Entry fee is $33 (including GST)<br/></strong></p>
         <p>&nbsp;</p>
        <p>
There are <strong>two payment options</strong> for this application process – you can either pay online with a credit card or by posting in a cheque or money order. If you choose the online payment option, it must be competed at the end of this application – you cannot return and pay at another time.</p>
        <p>&nbsp;</p>
        <p><strong>Please follow the payment options at the end of the application.</strong></p>
        <p>&nbsp;</p>
        <p>Please complete the following form:</p><p>&nbsp;</p>
        <p><span class="required">*</span> denotes required field</p>
        <p>&nbsp;</p>
       
          <form name="soundForm" id="soundForm" method="post" action="<?=base_url()?>apply_form">
             <div class="form-row">
                <div class="row-title">
                  Song Title<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Song title" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Artist/Band<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Artist band" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Date Film Completed<span class="required">*</span>
                </div>
                <div class="row-input">
                 <select name="Month completed">
                   <option value="January">Jan</option>
                   <option value="February">Feb</option>
                   <option value="March">Mar</option>
                   <option value="April">Apr</option>
                   <option value="May">May</option>
                   <option value="June">Jun</option>
                   <option value="July">Jul</option>
                   <option value="August">Aug</option>
                   <option value="September">Sep</option>
                   <option value="October">Oct</option>
                   <option value="November">Nov</option>
                   <option value="December">Dec</option>
                 </select>
                 &nbsp;
                 Year&nbsp;&nbsp;<input type="text" name="Year Completed" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Running Time<span class="required">*</span>
                </div>
                <div class="row-input">
                 <input type="text" name="Film running mins" />
                 &nbsp;&nbsp;Mins&nbsp;&nbsp;
                 <input type="text" name="Film running seconds" />&nbsp;&nbsp;Seconds
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                 State where film was made<span class="required">*</span>
                </div>
                <div class="row-input">
                 <select name="where film  was made">
                   <option value="VIC">VIC</option>
                   <option value="NSW">NSW</option>
                   <option value="SA">SA</option>
                   <option value="ACT">ACT</option>
                   <option value="WA">WA</option>
                   <option value="NT">NT</option>
				   <option value="QLD">QLD</option>
				   <option value="TAS">TAS</option>
                 </select>
                
                </div>
             </div>
              <div class="form-row">
                <div class="row-title">
                 Screening format<span class="required">*</span><br/>
                 <em>(Please see FAQ for information on preferred screening formats)</em>
                </div>
                <div class="row-input">
                 <select name="Screening format">
                   <option value="35mm">35mm</option>
                   <option value="16mm">16mm</option>
                   <option value="Digibeta">Digibeta</option>
                   <option value="HDCam">HDCam</option>
                   <option value="DVD(PAL Only)">DVD(PAL Only)</option>
                   <option value="SP Betacam">SP Betacam</option>
                 </select>
                
                </div>
             </div>
               <div class="form-row">
                <div class="row-title">
                 Screening ratio<span class="required">*</span>
                </div>
                <div class="row-input">
                 <select name="Screening ratio" id="screening_ratio" onchange="ratio_other()">
                   <option value="16:9 Full Height Anamorphic (FHA) *preferred">16:9 Full Height Anamorphic (FHA) *preferred</option>
                   <option value="4:3 (letterbox)">4:3 (letterbox)</option>
                   <option value="4:3 (full frame)">4:3 (full frame)</option>
                   <option value="1:1.37">1:1.37</option>
                   <option value="1:1.66">1:1.66</option>
                   <option value="1:1.85">1:1.85</option>
                   <option value="1:1.37">1:1.37</option>
                   <option value="1:1.66">1:1.66</option>
                   <option value="1:1.85">1:1.85</option>
                   <option value="Other">Other(please specify)</option>
                 </select>
                  &nbsp;<span id="ratio_other" style="display:none">Please specify&nbsp;<input type="text" name="screening_ratio_other" /></span>
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Audio specifications
                </div>
                <div class="row-input">
                  <input type="text" name="Audio specifications" />
                </div>
             </div>
             <p>&nbsp;</p>
             <p><strong>FILM DETAILS</strong>
                <p>&nbsp;</p>
              <div class="form-row">
                <div class="row-title">
                  Producer<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Producer" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Director<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Director" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Screewriter/s<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Screenwriter" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                    Director of Photography
                </div>
                <div class="row-input">
                  <input type="text" name="Director of Photography" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                    Production Designer
                </div>
                <div class="row-input">
                  <input type="text" name="Production Designer" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                     Sound Recordist
                </div>
                <div class="row-input">
                  <input type="text" name="Sound Recordist" />
                </div>
             </div>
            <div class="form-row">
                <div class="row-title">
                     Editor
                </div>
                <div class="row-input">
                  <input type="text" name="Editor" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                     Post Prod Sound/ Sound Design
                </div>
                <div class="row-input">
                  <input type="text" name="Post Prod Sound/Sound Design" />
                </div>
             </div>
              <div class="form-row">
                <div class="row-title">
                    Visual Effects
                </div>
                <div class="row-input">
                  <input type="text" name="Visual Effects" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                    Animator/s
                </div>
                <div class="row-input">
                  <input type="text" name="Animator" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                    Other Key Crew
                </div>
                <div class="row-input">
                  <input type="text" name="Other Key Crew" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                    Principal Cast
                </div>
                <div class="row-input">
                  <input type="text" name="Principal Cast" />
                </div>
             </div>
               <div class="form-row">
                <div class="row-title">
                 Synopsis<span class="required">*</span><br/>
                 <em>(Must not exceed 25 words. The Festival reserves the right to edit the synopsis for the printed program).</em>
                </div>
                <div class="row-input">
                <textarea rows="8" cols="50" id="sypnosis" name="sypnosis"></textarea>
                </div>
                <p>Please do not cut and paste into this section as it will effect the formatting and you may lose some text.</p>
             </div>
             <div class="form-row">
                <div class="row-title">
                 Publicity<span class="required">*</span><br/>
                 <em>Please provide us with some information about your film that we can use for publicity eg screening history, principal cast biogs, any other interesting information.</em>
                </div>
                <div class="row-input">
                <textarea rows="8" cols="50" name="publicity" id="publicity"></textarea>
                </div>
                <p>(Must not exceed 25 words. The Festival reserves the right to edit publicity for the printed program).
                <br/>Please do not cut and paste into this section as it will effect the formatting and you may lose some text.</p>
             </div>
             <div class="form-row">
                <div class="row-title">
                   Is this entry a student production?<span class="required">*</span>
                </div>
                <div class="row-input">
                  <select name="is student production">
                   <option value="Yes">Yes</option>
                   <option value="No">No</option>
               
                 </select>&nbsp;<span id="student_production">If yes,please state the name of the educational institution &nbsp;&nbsp;<input type="text" name="education institution" /></span>
                  
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                 Is your entry...
                </div>
                <div class="row-input">
                 <select name="is your entry">
                   <option value="An independent release">An independent release</option>
                   <option value="A major recording company release">A major recording company release</option>
               
                 </select>
                 
                </div>
             </div>
               <p>&nbsp;</p>
             <p><strong>PRINCIPAL CONTACT DETAILS</strong>
                <p>&nbsp;</p>
                <p>This person will be the main contact for the duration of the competition. All correspondence, including invitations, will be sent to this address. It is the entrant’s responsibility to notify the Festival if any of these details change.</p>
                 <p>&nbsp;</p>
              <div class="form-row">
                <div class="row-title">
                  First Name<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Principal first name" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Last Name<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Principal last name" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Position (eg Producer, Director etc)<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Principal position" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Production Company
                </div>
                <div class="row-input">
                  <input type="text" name="Principal production company" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Address<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Principal address" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Suburb<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Principal suburb" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  State<span class="required">*</span>
                </div>
                <div class="row-input">
                  <select name="Principal state">
                   <option value="VIC">VIC</option>
                   <option value="NSW">NSW</option>
                   <option value="SA">SA</option>
                   <option value="ACT">ACT</option>
                   <option value="WA">WA</option>
                   <option value="NT">NT</option>
				   <option value="QLD">QLD</option>
				   <option value="TAS">TAS</option>
                 </select>
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Postcode<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Principal postcode" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Telephone (business hours)<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Telephone business hours" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Telephone (after hours)<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="Telephone after hours" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Mobile
                </div>
                <div class="row-input">
                  <input type="text" name="Principal mobile" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Fax
                </div>
                <div class="row-input">
                  <input type="text" name="Principal fax" />
                </div>
             </div>
              <div class="form-row">
                <div class="row-title">
                  Email address (private)<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="email private" />
                </div>
             </div>
              <div class="form-row">
                <div class="row-title">
                  Email address (public - can be provided to media, other filmmakers, festivals or general inquiries)<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="email public" />
                </div>
             </div>
             <p>&nbsp;</p>
             <p><strong>RETURN ADDRESS DETAILS</strong>
                <p>&nbsp;</p>
             <div class="form-row">
                <div class="row-title">
                  Address<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="return address" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  Suburb<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="return suburb" />
                </div>
             </div>
             <div class="form-row">
                <div class="row-title">
                  State<span class="required">*</span>
                </div>
                <div class="row-input">
                
                  <select name="return state">
                   <option value="VIC">VIC</option>
                   <option value="NSW">NSW</option>
                   <option value="SA">SA</option>
                   <option value="ACT">ACT</option>
                   <option value="WA">WA</option>
                   <option value="NT">NT</option>
				   <option value="QLD">QLD</option>
				   <option value="TAS">TAS</option>
                 </select>
              
                </div>
             </div>
              <div class="form-row">
                <div class="row-title">
                  Postcode<span class="required">*</span>
                </div>
                <div class="row-input">
                  <input type="text" name="return postcode" />
                </div>
             </div>
               <p>&nbsp;</p>
             <p><strong>PAYMENT OPTIONS</strong>
                <p>&nbsp;</p>
                
                <p><input type="radio" name="payment_option" value="credit card" />&nbsp;&nbsp;Credit Card</p> <p>&nbsp;</p>
                 <p><input type="radio" name="payment_option" value="cheque or money order" />&nbsp;&nbsp;Posting in a cheque or money order</p><p>&nbsp;</p>
                 <p>By submitting this entry form you are certifying that you have read and agree to the <a style="color:#F2812E" href="#">terms and conditions</a> of entry.</p><p>&nbsp;</p>
                 <p>Please note that you must have cookies enabled on your browser to continue.</p><p>&nbsp;</p>
                 <input type="hidden" name="entry_form" value="soundkilda" />
                 <p><input type="submit" name="submit" value="Submit" /></p>
          </form>
          
   
    <?php foreach($films as $film) { 
		$genres = $this->film_model->get_film_genres($film['id']); 
		$genre = '';
		if ($genres) {
			$genre = $genres[0]['name'];
			for($i=1;$i<count($genres);$i++) { 
				$genre .= ', '.$genres[$i]['name'];
			} 
		} ?>
    <div class="film">
        <div class="photo">
        	<a href="<?=base_url()?>details/<?=$film['id']?>">
			<?php if($film['small_image'] != "") { ?>
            <img src="<?=base_url()?>uploads/films/<?=$film['small_image']?>" />
            <?php } else { ?>
            <img src="<?=base_url()?>img/noimage.png" />
            <?php } ?>
            </a>
        </div>
        <div class="text">
        	<div class="brief">
            	<div class="title"><?=$film['title']?></div>
            	<p>
					<?php 
						$text = $film['synopsis'];
						if (strlen($text) > 130) {
							$text = substr($text,0,135).'...';
						}
						print $text;
					?>
                </p>
            </div>
            <div class="more">
            	<?php if ($film['type'] > 1) { ?>
            	<h4><a href="<?=base_url()?>details/<?=$film['id']?>">More information</a></h4>
                <?php } else { ?><br /><?php } ?>
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
                <p><span>Artist</span> 
                	<?php
					$artist = $film['artist'];
						if (strlen($artist) > 18) { $artist = substr($artist,0,18).'...'; }
						print $artist;                        
                } ?>
                </p>
                
				<?php if ($genre != "") { ?>
                <p><span>Genre</span> <?=$genre?></p>
                <?php } ?>
                
                <?php if ($film['director'] != "") { ?>
                <p><span>Director</span> 
					<?php
                    	$director = $film['director'];
						if (strlen($director) > 16) { $director = substr($director,0,16).'...'; }
						print $director;
					?>
                </p>
                <?php } ?>
                
				<?php if ($film['producer'] != "") { ?>
                <p><span>Producer</span> 
					<?php 
						$producer = $film['producer']; 
						if (strlen($producer) > 15) { $producer = substr($producer,0,15).'...'; }
						print $producer;
					?>
                </p>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    

      <div style="clear:both"></div>
    </div>
      <div id="sponsors"><div style="padding-top:15px;margin:0 auto"><img src="<?=base_url()?>img/NewFooter.jpg" alt="Sponsors" border="0" usemap="#Map"  width="704" height="98"/><map name="Map" id="Map">
  <area shape="rect" coords="0,1,102,98" href="http://www.portphillip.vic.gov.au/" target="_blank" />
  <area shape="rect" coords="122,1,297,98" href="http://www.screenaustralia.gov.au/" target="_blank" />
  <area shape="rect" coords="300,1,528,102" href="http://film.vic.gov.au/www/html/7-home-page.asp" target="_blank" />
  <area shape="rect" coords="546,1,714,97" href="http://www.simplyenergy.com.au/movie" target="_blank" />
</map></div>
      </div>
   </div>