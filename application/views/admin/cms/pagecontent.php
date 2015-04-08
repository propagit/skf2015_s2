<?php //require_once($_SERVER['DOCUMENT_ROOT'].'/2013-s2/cuteeditor_files/include_CuteEditor.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?=base_url()?>css/admin.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Dosis:400,200,300,500,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
<script> var $j = jQuery.noConflict(); </script>
<title><?=$page['title']?> - Update page content</title>
<style>
body { background:#000; margin:20px; }
table,tr,td { font-size:12px; }
.msg-ok { color:#008000; padding:3px 0 -3px 10px; }
a { color:#fff; }
.whitebg { background:#fff; width:100%; height:100%; }
</style>
<script>
	function enlargeWindow(){
	window.moveTo(0,0);
	window.resizeTo(screen.availWidth,screen.availHeight);
	}
</script>
</head>

<body onLoad="enlargeWindow()">

<form method="post" action="<?=base_url()?>admin/cms/updatecontent">
<input type="hidden" name="id" value="<?=$page['id']?>" />
<?php	

    $this->cute_model->ID="content_text";
    $this->cute_model->Text= $page['content'];
    $this->cute_model->UseHTMLEntities = true;
    $this->cute_model->EditorWysiwygModeCss=base_url()."css/template.css";			
    //$this->cute_model->FilesPath=base_url()."js/cute";
    $this->cute_model->Draw();
    $this->cute_model = null;	
	
	
	// $editor=new CuteEditor();   
    // $editor->Text=$page['content'];	
	// //$editor->Width="600px";
// 	
	// $editor->EditorWysiwygModeCss =base_url()."css/template.css";	
	// $editor->AutoConfigure="Default";			
    // //Step 3: Set a unique ID to Editor   
    // $editor->ID="content_text"; 
    // //Step 4: Render Editor   
    // $editor->Draw();   
	// $editor=null;  			
?>
<br />
<dl><dt><input type="submit" class="button rounded" value="Update" /></dt>
<?php if ($this->session->flashdata('updated')) { ?>
<dt class="msg-ok">Updated successfully!</dt>
<?php } ?>
</dl>
</form>

</body>
</html>
