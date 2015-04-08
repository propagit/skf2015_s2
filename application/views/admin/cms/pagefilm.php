<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?=base_url()?>css/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
<script> var $j = jQuery.noConflict(); </script>
<script>
$j(function() { 
	settype();
});
function settype() {
	var keyword = $j('#keyword').val();
	var type = $j('#type').val();
	$j.ajax({
		url: '<?=base_url()?>admin/cms/settype',
		type: 'POST',
		data: ({keyword:keyword,type:type}),
		dataType: "html",
		success: function(html) {
			getfilms();
		}
	})	
}
function getfilms() {
	$j.ajax({
		url: '<?=base_url()?>admin/cms/getfilms',
		type: 'POST',
		data: ({page_id:'<?=$page['id']?>',row:'<?=$this->uri->segment(6)?>'}),
		dataType: "html",
		success: function(html) {
			$j('#films-list').html(html);
		}
	})	
}
</script>
<title>Add film to page <?=$page['title']?></title>
<style>
body { background:#E8EDF2; margin:20px; }
p { padding:3px 0; }
dl { width:300px; }
dl dt { float:left; }
dl dd { float:right; }
.box-add { width:500px; }
.pages { float:left; }
.rowfilm { clear:both; border-bottom:1px solid #ccc; line-height:30px; }
.rowfilm .title { float:left; }
.rowfilm .button { float:right; }
</style>
</head>

<body>
<div class="box-add">    
    <dl>
    	<dt>Keyword</dt>
    	<dd><input type="text" class="textfield rounded" id="keyword" onkeydown="settype()" onkeyup="settype()" onkeypress="settype()" value="<?=$this->session->userdata('s_keyword')?>" /></dd>
    </dl>
    <dl>
    	<dt>Filter by</dt>
        <dd>
        	<select id="type" onchange="settype()">
            	<option value="0">Any type</option>
            	<option value="1"<?php if($this->session->userdata('s_type') == 1) print ' selected="selected"'; ?>>Film</option>
                <option value="2"<?php if($this->session->userdata('s_type') == 2) print ' selected="selected"'; ?>>SoundKILDA</option>
                <option value="3"<?php if($this->session->userdata('s_type') == 3) print ' selected="selected"'; ?>>Top 100</option>
            </select>
        </dd>
    </dl><dl></dl>
    <div id="films-list">
    
    </div>
</div>
</body>
</html>
