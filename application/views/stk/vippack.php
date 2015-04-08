<div id="bodier">
    <div id="content" class="form">
    	<div class="orangeheader">ENTRIES ARE NOW CLOSED<br />
        WINNERS WILL BE NOTIFIED BY PHONE</div>
        <!-- 
        <div class="orangeheader">Enter here for your chance to win!!!</div>
        <p class="uppercase"><b>St Kilda Film Festival VIP Pack</b></p>
        <p class="uppercase">Winners Pack includes</p>
        <ul>
        	<li>Double pass to Opening Night Screening & After Party</li>
            <li>Film Buff's Feast - your ticket to all St Kilda Film Festival sessions</li>
            <li>St Kilda Film Festival t-shirt</li>
            <li>Crumpler Bag</li>
            <li>Pepe Jeans denim voucher to the value of $199</li>
        </ul>
        <p class="uppercase">2nd Prize Pack includes</p>
        <ul>
        	<li>Double pass to Opening Night Screening & After Party</li>
            <li>Crumpler Bag</li>
            <li>St Kilda Film Festival t-shirt</li>
        </ul>
        <?php if (!$this->session->flashdata('enter_ok')) { ?>
        <form name="vipForm" method="post" action="<?=base_url()?>enter">
        <dl><dt>Name</dt><dd><input type="text" class="textfield" name="name" value="<?=$this->session->userdata('vip_name')?>" /></dd>
        	<dd class="error"><?=$this->session->flashdata('error_name')?></dd>
        </dl>
        <dl><dt>Mobile</dt><dd><input type="text" class="textfield" name="mobile" value="<?=$this->session->userdata('vip_mobile')?>" /></dd>
        	<dd class="error"><?=$this->session->flashdata('error_mobile')?></dd>
        </dl>
        <dl><dt>Email</dt><dd><input type="text" class="textfield" name="email" value="<?=$this->session->userdata('vip_email')?>" /></dd>
        	<dd class="error"><?=$this->session->flashdata('error_email')?></dd>
        </dl>
        <dl></dl>
        <p><input type="checkbox" name="subscribe_stkilda" /> Tick here if you'd like to receive email updates from St Kilda Film Festival</p>
        <p><input type="checkbox" name="subscribe_pepe" /> Tick here if you'd like to receive email updates from Pepe Jeans</p>
        <p><input type="checkbox" name="subscribe_crumpler" /> Tick here if you'd like to receive email updates from Crumpler</p>
        <p><input type="submit" class="button" value="Submit" /></p>
        </form>
        <?php } else { ?>
        <p class="uppercase"><b>Thanks for entering, good luck and have a great Festival!</b></p>
        <?php } ?>
        <p class="desc">Terms and Conditions/ Privacy Policy</p>
        <p class="desc">City of Port Phillip staff, volunteers and contractors are not eligible to apply. Winners will be drawn on Monday 24 May 2010 and will be notified by phone. Prizes are not transferable and cannot be exchanged for cash. The information that is collected on this occasion is subject to the requirements of the Information Privacy Act 2000. Personal information includes your name, address, contact details and other information which can identify you. The personal information collected will be used solely by the City of Port Phillip for the primary purpose of notifying winners of this competition or the directly related purposes of adding you to the St Kilda Film Festival, Pepe Jeans or Crumpler mailing lists if you have indicated you would like to receive.</p>
        <br />
        <p><img src="<?=base_url()?>Uploads/9_Pepe.jpg" style="float:left; margin:30px 20px 0 0;" /><img src="<?=base_url()?>Uploads/crumpler-logo.jpg" style="float:left;" /></p>
        <dl></dl> -->
    </div>    
</div>