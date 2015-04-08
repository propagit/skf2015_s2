<div id="bodier">
    <div id="content">
       <div class="sponsor">
          <? if(isset($entry))
					  {
						  $form = $this->session->userdata('entry_type');
						  $id = $entry['id'];
						  ?>
                           <script type="text/javascript">
function usePage(frm,nm){
for (var i_tem = 0, bobs=frm.elements; i_tem < bobs.length; i_tem++)
if(bobs[i_tem].name==nm&&bobs[i_tem].checked)
frm.action=bobs[i_tem].value;
}
</script>
<!-- onSubmit="usePage(this, 'bob');" -->
						  	<FORM METHOD=POST action="https://vault.safepay.com.au/cgi-bin/make_payment.pl"  NAME="UD">
         
			
			             <INPUT TYPE=Hidden NAME=reply_link_url VALUE="http://www.stkildafilmfestival.com.au/payment_return/?id=<?=$id?>&&form=<?=$form?>&&payment_number=">
                        
<p>Thank you for completing the form. 
 Please follow the steps below to make your payment...</p>




	<INPUT TYPE=Hidden NAME=vendor_name VALUE=portphillip>
<!--
<P><B>Payment Method:</B><BR>

<TABLE BORDER=0 CELLSPACING=1>
  
  <TR>
		<TD><input type="radio" name="bob" value="https://vault.safepay.com.au/cgi-bin/make_payment.pl"> </TD>
		<TD>Credit Card</TD>

	</TR>
</TABLE>
-->
<br />
<P><B>Payment Information:</B><BR>

<TABLE BORDER=0 CELLSPACING=1>
  <TR>
		<TD>Name: </TD>
		<TD><INPUT TYPE=Text NAME=name SIZE=30  ><BR></TD>
	</TR>
  <TR>
		<TD>Email Address: </TD>
		<TD><INPUT TYPE=Text NAME=Contact_email SIZE=30><BR></TD>

	</TR>
</TABLE>
<br />
<P><B>Billing Information:</B><br /><TABLE BORDER=0 CELLSPACING=1>
	<TR>
		<TD>Name: </TD><TD><INPUT TYPE=Text NAME=Billing_name SIZE=30></TD>
	</TR>
	<TR>
		<TD>Address Line 1: </TD>

		<TD><INPUT TYPE=Text NAME=Billing_address1 SIZE=30></TD>
	</TR>
</TABLE>
<br />
<INPUT TYPE=Hidden NAME=Application_Fee_value    VALUE="33">
        	<INPUT TYPE=Hidden NAME=Application_Fee_qty    VALUE="1">
            <INPUT TYPE=Hidden   NAME=Application_Fee_subtotal VALUE="33">
            <INPUT TYPE=Hidden NAME=Application_Fee     VALUE="33" >
            <INPUT TYPE=Hidden NAME=OrderTotal value=33>
	<INPUT TYPE=Hidden NAME=information_fields VALUE="Billing_name,Billing_address1,Band_name, Contact_email">

	<INPUT TYPE=Hidden NAME=suppress_field_names VALUE="">

	<INPUT TYPE=Hidden NAME=hidden_fields VALUE="Application_Fee_value,Application_Fee_qty,Application_Fee_subtotal,OrderTotal">

	<INPUT TYPE=Hidden NAME=print_zero_qty VALUE=false>

	<input type="image" src="http://www.odessa.net.au/skf2010/images/pay.jpg" border="0" alt="Proceed to payment" title=" Confirm Order " >
	<!-- onClick="return validateForm()" -->
  <p>Your credit card payment will be processed securly by DirectOne Payment Solutions.
	<br>Please click the DirectOne logo below to find out more about payment security.
	<br><A HREF=http://www.directone.com.au/html/contacts/vendor_link.html target='_blank'><img src=http://www.directone.com.au/images/safe_link.gif BORDER=0></A>
</FORM>

            <?
					  }
					  else
					  {
			?>
			<div class="messagethanks">
			<p><strong>Thank you for submitting your application for the 2011 St Kilda Film Festival.</strong></p>

<p><strong>ENTRIES MUST RECEIVED OR POST MARKED BY 5PM JANUARY 29 2011.</strong></p>
<p>Preview tapes and additional material should be posted to:</p>
<p>
St Kilda Film Festival<br />
Private Bag No 3<br />
PO St Kilda <br />
VIC 3182</p>
<p>
Or delivered by hand to:<br />
St Kilda Film Festival<br />
Level 1<br />
232 Carlisle Street<br />
Balaclava<br />
VIC 3183</p>

<strong>What material should I submit?</strong>
<ol> 
<li>Entry form completed and submitted</li>
<li>Payment completed via online service, or by cheque or money order sent with preview tape.</li>
<li>Preview copy of film on DVD (please ensure DVD is not copy-protected, as multiple copies may need to be made for judging).</li>
<li>One film still to be used in the program/website if film is successful.</li>
</ul>
<p>
Stills must be submitted on a CD. Please ensure resolution is at least 300 DPI and as large as possible. Do not email your stills - the large files block up our inbox! Materials that are emailed will not be accepted.</p>
<p>
<strong>OPTIONAL MATERIAL:</strong><br />
<ul>
<li>CV of the writer/director/producer</li>
<li>Publicity material (ie reviews, press kits etc)</li>
</ul>
</p>
</div>
			<?php
					  }
		  ?>
       </div>
    	
    </div>
  
</div>