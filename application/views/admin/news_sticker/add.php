<script>
function addNews() {
	var title = $j('#heading').val();
	if (title == '') {
		alert('Please enter a heading for this news sticker');
	} else {
		document.addForm.submit();
	}
}
</script>
<h1>Content Management</h1>
<div class="bar">

    <div class="text">Add News Sticker</div>
    <div class="cr"></div>
</div>
<div class="box bgw">
    	<form name="addForm" method="post" enctype="multipart/form-data" action="<?=base_url()?>admin/news_sticker/adding">
    	<dl class="news"><dt>Heading</dt><dd><input type="text" class="medium" name="heading" id="heading" /></dd></dl>
        <div style="clear:both"></div><br/>
        <dl class="news"><dt>Sub Heading</dt><dd><input type="text" class="medium" name="subheading" id="subheading" /></dd></dl><div style="clear:both"></div><br/>
    	<dl class="news"><dt>Description</dt>
    		<dd><textarea name="description" rows="6"></textarea></dd>
    	</dl>
        <div style="clear:both"></div><br/>
        <dl class="news"><dt>Link to</dt><dd><input type="text" class="medium" name="url" id="url" /></dd></dl>
        <div style="clear:both"></div><br/>
    	<dl class="news"><dt>Publish</dt><dd><input type="checkbox" name="published" /></dd></dl></dl>
    	<dl class="news"><dt>Preview Image</dt><dd><input type="file" name="userfile" /> <i><strong>(<?=BANNER_WIDTH;?>px x <?=BANNER_HEIGHT;?>px)</strong></i></dd></dl>
    	<dl></dl>
    	<br />
		</form>
    	<p><input class="button rounded" type="button" value="Create News Sticker" onclick="javascript:addNews()"></p>
   
</div>