<aside id="side-panel">
	<div class="hidden-xs">
		<?php $this->load->view('stk/common/calendar');?>
	</div>
    
    <hr>
    
    <div class="timer-wrap">
        <h4>countdown</h4>
        <div id="countdown-timer" class="timer">
        
           <?php if(0){ ?>
           <span class="countdown-row countdown-show4"><span class="countdown-section"><span class="countdown-amount">67</span><span class="countdown-period">DAYS</span></span><span class="countdown-section"><span class="countdown-amount">07</span><span class="countdown-period">HOURS</span></span><span class="countdown-section"><span class="countdown-amount">31</span><span class="countdown-period">MINS</span></span><span class="countdown-section"><span class="countdown-amount">16</span><span class="countdown-period">SECS</span></span></span>
           <?php } # for testing the css, comment $('#countdown-timer').countdown ... in the script below ?>
        </div>
        <span class="label skf-start-label">Until the St Kilda Film Festival starts</span>
        
        <hr>
        <div class="clear"></div>
        
        <h4>follow us</h4>
        <ul>
            <li><a href="<?=FACEBOOK;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="<?=TWITTER;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="<?=YOUTUBE;?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
            <li><a href="<?=INSTAGRAM;?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
        </ul>
        
        <hr>
        <div class="clear"></div>
        
        <h4>search films</h4>
        <div class="subscribe-box">
        	<form method="post" action="<?=base_url()?>search"> 
            	<input type="text" id="keyword" name="keyword">
            	<button type="submit" class="btn subscribe-btn">Search</button>
            </form>
        </div>
    </div>
    
</aside>


<div id="newsletter-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header" style="border-bottom:none;">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      	</div>
      	<div class="modal-body" style="text-align:center;">
       		 <p id="newsletter-msg"></p>
      	</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  

<?php
	$opening = $this->menu_model->get_opening_date();
	#print_r($opening);
	$year = date('Y',strtotime($opening['opening_date']));
	$month = date('m',strtotime($opening['opening_date']));
	$day = date('d',strtotime($opening['opening_date']));
?>     
<script>
$('#countdown-timer').countdown({
	until: new Date(<?=$year;?>,<?=$month-1;?>,<?=$day;?>),
	padZeroes: true,
	labels: ['YEARS', 'MONTHS', 'WEEKS', 'DAYS', 'HOURS', 'MINS', 'SECS'],
	
}); 

$(function(){
	$('#newsletter-btn').click(function(){
		$('#newsletter-btn').html('<i class="fa fa-spinner fa-spin"></i>');
		$.ajax({
		   		type: "POST",
		   		url: "<?php echo base_url()?>stk/subscribe",
		  	 	data: { email: $('#newsletter-email').val() }
		   }).done(function( msg ) {
			    $('#newsletter-btn').html('Enter');
				$('#newsletter-msg').html(msg);
				$('#newsletter-modal').modal('show');
		 });
	});
});
</script>