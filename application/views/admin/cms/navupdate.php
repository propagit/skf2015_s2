<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/popup.css"> 
<script type="text/javascript" src="<?=base_url()?>js/popup.js"></script> 
<script>
$j(function() { 
	updatepos();
});
function updatepos() {
	var parentid = $j('#parentid').val();
	$j.ajax({
		url: '<?=base_url()?>admin/cms/getposlist',
		type: 'POST',
		data: ({menuid:'<?=$menu['id']?>',parentid:parentid}),
		dataType: "html",
		success: function(html) {
			$j('#position').html(html);
		}
	})
}
function addlink() {
	if ($j('#name').val() == "") {
		alert('Please enter a title for the link');
	} else {
		document.addForm.submit();
	}
}
function editlink(id) {
	$j.ajax({
		url: '<?=base_url()?>admin/cms/getlink',
		type: 'POST',
		data: ({id:id}),
		dataType: "html",
		success: function(html) {
			$j('#popup-content').html(html);
			centerPopup();
			loadPopup();
		}
	})	
}
function deletelink(id) {
	if (confirm('Are you sure to delete this link?')) {
		window.location = '<?=base_url()?>admin/cms/deletelink/' + id;
	}
}
function updateurl() {
	var path = $j('#page-title').val();
	$j('#url').val(path);
}
function updateurl2() {
	var path = $j('#page-title2').val();
	$j('#url2').val(path);
}
</script>
<h1>Content Management</h1>
<div class="bar">
    <div class="text">Navigation Manager</div>
    <div class="cr"></div>
</div>
<div class="box"><br />
	<div class="box-add">
        <form name="addForm" method="post" action="<?=base_url()?>admin/cms/addlink">
        <input type="hidden" name="menu_id" value="<?=$menu['id']?>" />
        <dl><dt>Name</dt><dd><input type="text" class="textfield rounded" name="name" id="name" /></dd></dl>
        <dl><dt>Parent</dt><dd>
            <select name="parent_id" id="parentid" onchange="updatepos()">
                <option value="0">No parent</option>
                <?php foreach($links as $link) { ?>
                <option value="<?=$link['id']?>"><?=$link['name']?></option>
                <?php } ?>
            </select>
        </dd></dl>
        <dl><dt>Position</dt><dd id="position">
            
        </dd></dl>
        <dl><dt>Url</dt><dd>
            <select id="page-title" onchange="updateurl()">
                <option>Please select a page</option>
                <?php foreach($root as $category) { ?>
                <option disabled="disabled"><?=$category['name']?></option>
                <?php
				$pages = $this->content_model->get($category['id']);
				if ($pages) { 
					foreach($pages as $page) { ?>
                	<option value="page-<?=$page['id']?>/<?=$page['name']?>">|-- <?=$page['title']?></option>
                <?php }
					} 
					$children = $this->content_model->sub_categories($category['id']); 
					if ($children) {
						foreach($children as $child) { ?>
						<option disabled="disabled"><?=$category['name']?> &raquo; <?=$child['name']?></option>
                		<?php $pages = $this->content_model->get($child['id']);
						if ($pages) {
							foreach($pages as $page) { ?>
                    		<option value="page-<?=$page['id']?>/<?=$page['name']?>">|-- <?=$page['title']?></option>
                		<?php }
							}
							$children2 = $this->content_model->sub_categories($child['id']);
							if ($children2) {
								foreach($children2 as $child2) { ?>
                                <option disabled="disabled"><?=$category['name']?> &raquo; <?=$child['name']?> &raquo; <?=$child2['name']?></option>
                                <?php $pages = $this->content_model->get($child2['id']);
								if ($pages) {
									foreach($pages as $page) { ?>
									<option value="page-<?=$page['id']?>/<?=$page['name']?>">|-- <?=$page['title']?></option>
								<?php }
									}
								}
							}
						}
					} 
				} ?>
            </select>
        </dd></dl>
        <dl><dt><input type="text" class="textfield rounded" name="url" id="url" value="http://" /></dt></dl>
        <dl><dd><input type="button" class="button rounded" value="Add" onclick="addlink()" /></dd></dl>
        </form>
    </div>
    
    <div class="box-edit" id="list">
        <ul class="em">
    	<?php foreach($links as $link) {
		$children = $this->menu_model->get_links($menu['id'],$link['id']);
		if(!$children) { ?>
        	<li class="nochild"><a href="javascript:editlink(<?=$link['id']?>)"><?=$link['name']?></a> <div><a href="javascript:deletelink(<?=$link['id']?>)"><img src="<?=base_url()?>img/admin/delete2.png" /></a></div></li>
        <?php } else { ?>
        	<li class="haschild"><a href="javascript:editlink(<?=$link['id']?>)"><?=$link['name']?></a>
                <ul>
                    <?php foreach($children as $child) { ?>
                    <li id="link-<?=$child['id']?>"><a href="#" onclick="editlink(<?=$child['id']?>)"><?=$child['name']?></a> <div><a href="javascript:deletelink(<?=$child['id']?>)"><img src="<?=base_url()?>img/admin/delete2.png" /></a></div></li>
                    <?php } ?>
                </ul>
          	</li>
		<?php } 
		} ?>        
        </ul>
    </div>
    <dl></dl>
</div>

<div id="popup-box">
	<div id="popup-content">
    	
    </div>
</div>
<div id="background-popup"></div>