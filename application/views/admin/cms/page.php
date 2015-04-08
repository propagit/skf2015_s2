<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/popup.css"> 
<script type="text/javascript" src="<?=base_url()?>js/popup.js"></script> 
<script>
$j(function() { 
	<?php if($this->session->userdata('category_id')) { ?>
	$j('#category_id').val(<?=$this->session->userdata('category_id')?>);
	<?php } ?>
	getpages();	
});
function addnew() {
	centerPopup();
	loadPopup();
	$j('#name').focus();
}
function addcat() {
	if($j('#name').val() == "") {
		alert('Please enter a name for new category');
	} else {
		document.addForm.submit();
	}
}
function deletepage(id) {
	if (confirm('Are you sure you want to delete this page?')) {
		$j.ajax({
			url: '<?=base_url()?>admin/cms/deletepage',
			type: 'POST',
			data: ({id:id}),
			dataType: "html",
			success: function(html) {
				$j('#page-' + id).fadeOut();
			}
		})	
	}
}
function getpages() {
	var category_id = $j('#category_id').val();
	$j.ajax({
		url: '<?=base_url()?>admin/cms/getpages',
		type: 'POST',
		data: ({category_id:category_id}),
		dataType: "html",
		success: function(html) {
			$j('#page-list').html(html);
		}
	})	
}
function addpage() {
	var category_id = $j('#category_id').val();
	$j.ajax({
		url: '<?=base_url()?>admin/cms/addpage',
		type: 'POST',
		data: ({category_id:category_id}),
		dataType: "html",
		success: function(html) {
			$j('#page-add').html(html);
			$j('#title').focus();
		}
	})
}
function cancel() { $j('#page-add').html(''); }
function addingpage() {
	if($j('#title').val() == "") {
		alert('Please enter a title for new page');
	} else {
		document.addPageForm.submit();
	}
}
function film(page_id) {
day = new Date();
id = day.getTime();
URL = '<?=base_url()?>admin/cms/page/film/' + page_id;
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=540,height=500,left = 240,top = 125');");
}
function content(page_id) {
day = new Date();
id = day.getTime();
URL = '<?=base_url()?>admin/cms/page/content/' + page_id;
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=680,height=550,left = 280,top = 150');");
}
</script>
<h1>Content Management</h1>
<div class="bar">
    <div class="text">Page Manager</div>
    <div class="cr"></div>
</div>
<div class="box">
	<dl><dd><a href="javascript:addnew()">Add new category</a></dd></dl>
    <select id="category_id" onChange="getpages()">
        <?php foreach($root as $category) { ?>
        <option value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php $children = $this->content_model->sub_categories($category['id']);
		if($children) {
			foreach($children as $child) { ?>
            <option value="<?=$child['id']?>">|-- <?=$child['name']?></option>
            <?php $children2 = $this->content_model->sub_categories($child['id']);
			if ($children2) {
				foreach($children2 as $child2) { ?>
                <option value="<?=$child2['id']?>">|-- |-- <?=$child2['name']?></option>
            <?php }
			}
			?>
        <?php }
			} 
		} ?>
    </select>
    <dl></dl>    
</div>
<hr />
<div class="box bgw">
	<dl><dd><a href="javascript:addpage()">Add new page</a></dd></dl>
    <h3>Page List</h3><dl></dl>
	<div class="row-title">
    	<div class="menu-name">Page title</div>
        <div class="menu-func">Delete</div>
        <div class="menu-func">Content</div>
        <div class="menu-func">Films</div>
    </div>
    <div id="page-list">
    </div>
    <div id="page-add"></div>
</div>
<hr />


<div id="popup-box">
	<div id="popup-content">
    	<h3>Add new category</h3>
        <form name="addForm" method="post" action="<?=base_url()?>admin/cms/addcat">
        <p>Name</p>
        <p><input type="text" class="textfield rounded" id="name" name="name" /></p>
        <p>Parent</p>
        <p><select name="parent_id">
            <option value="0">No parent</option>
            <?php foreach($root as $category) { ?>
            <option value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php $children = $this->content_model->sub_categories($category['id']);
			if($children) {
				foreach($children as $child) { ?>
				<option value="<?=$child['id']?>">|-- <?=$child['name']?></option>
                <?php $children2 = $this->content_model->sub_categories($child['id']);
				if ($children2) {
					foreach($children2 as $child2) { ?>
					<option value="<?=$child2['id']?>">|-- |-- <?=$child2['name']?></option>
				<?php }
				}
				?>
			<?php }
				} 
			} ?>
        </select></p>
        <p><input type="button" class="button rounded" value="Add" onclick="addcat()" /></p>
        </form>
    </div>
</div>
<div id="background-popup"></div>