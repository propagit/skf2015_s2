		</div>
        <!-- RIGHT NAVIGATION -->
        <div class="right">
        	<?php if ($this->session->userdata('a_loggedin')) { ?>        
        	<ul class="rightnav">
            	<li class="header">1. Content Management System</li>
                <li><a href="<?=base_url()?>admin">CMS Home</a></li>
            	<li><a href="<?=base_url()?>" target="_blank">Browse Frontend</a></li>
                <li><a href="<?=base_url()?>admin/cms/page">Page Manager</a></li>
                <li><a href="<?=base_url()?>admin/cms/navigation/update/1">Navigation Manager</a></li>
                <!-- <li><a href="<?=base_url()?>admin">Gallery Manager</a></li> -->
                <li><a href="<?=base_url()?>admin/cms/banner">Banner Manager</a></li>
                <li><a href="<?=base_url()?>admin/news">News Manager</a></li>
                <li><a href="<?=base_url()?>admin/news_sticker">Manage News Ticker Rotating</a></li>
                <li><a href="<?=base_url()?>admin/cms/opening_date">Set Opening Date</a></li>
            </ul>
            
            <ul class="rightnav">
            	<li class="header">2. Film/Sound Management</li>
                <li><a href="<?=base_url()?>admin/fsm/film">Create Film/Sound</a></li>
            	<li><a href="<?=base_url()?>admin/fsm">Search Films/Sounds</a></li>
                 <li><a href="<?=base_url()?>admin/cms/soundkilda_export">Export Sound Kilda Entry</a></li>
            	<li><a href="<?=base_url()?>admin/cms/shortfilm_export">Export Short Film Entry</a></li>
            </ul>
            
            <ul class="rightnav">
            	<li class="header">3. Online Marketing Tool</li>
                <li><a href="<?=base_url()?>admin/omt/subscriber">Subscribers</a></li>
                <li><a target="_blank" href="https://sms.simplysuite.com.au/login/check/festival/YuwS9WzG">Send SMS</a></li>
            	<li><a target="_blank" href="https://email.simplysuite.com.au/login/check/festival/YuwS9WzG">Send HTML Email</a></li>
                <li><a target="_blank" href="https://survey.simplysuite.com.au/login/check/festival/YuwS9WzG">Create Online Survey</a></li>
            </ul>
            <ul class="rightnav">
            	<li class="header">4. Competition entries</li>
                <li><a href="<?=base_url()?>admin/cms/competition_export">Export competition entries</a></li>
             
            </ul>
            <?php } else { ?>
            <ul class="rightnav">
            	<li class="header">1. Content Management System</li>
                <li><a href="<?=base_url()?>admin">Login</a></li>
            	<li><a href="<?=base_url()?>" target="_blank">Browse Frontend</a></li>
            </ul>
            
            <?php } ?>
        </div>
        <!-- RIGHT NAVIGATION // END -->
    <dl></dl>
    </div>
    
</div>	
<!-- FOOTER -->
<div id="footer">
    <p>&reg; <a href="<?=base_url()?>"><?=PROJECT_NAME?></a></p>
    <p>CMS Powered by &copy; <a href="http://www.propagate.com.au" target="_blank">Propagate World Wide Pty Ltd</a>.</p>
</div>
<!-- FOOTER // END -->

</body>
</html>
  