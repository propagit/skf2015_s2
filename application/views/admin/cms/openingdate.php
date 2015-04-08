<script type="text/javascript" src="<?=base_url()?>js/jquery.ui.js"></script>
<script>
$j(function() {
	// Drag and drop
	$j("#newslist").sortable({ 
		opacity: 0.8, 
		cursor: 'move', 
		update: function() {			
			var order = $j(this).sortable("serialize") + '&update=update'; 
			$j.post("<?=base_url()?>admin/news_sticker/reorder", order, function(html){	
				
			});
		}
	});
	$j('.status').click(function(){
		var id = $j(this).attr('alt');
		$j.ajax({
			url: '<?=base_url()?>admin/news_sticker/switchstatus',
			type: 'POST',
			data: ({id:id}),
			dataType: "html",
			success: function(html) {
				$j('#status-' + id).attr('src',html);
			}
		})
	});
	$j("#date").datepicker({dateFormat: "yy-mm-dd"});
});
function deletenews(id) {
	if(confirm('Are you sure you want to completely delete this news sticker?')) {
		$j.ajax({
			url: '<?=base_url()?>admin/news_sticker/delete',
			type: 'POST',
			data: ({id:id}),
			dataType: "html",
			success: function(html) {
				$j('#news_' + id).fadeOut();
			}
		})		
	}
}
</script>
<h1>Content Management</h1>
<div class="bar">

    <div class="text">Manage News Sticker</div>
    <div class="cr"></div>
</div>
<div class="box">
	<?php
		$date = $this->menu_model->get_opening_date();
    ?>
    	<p>
        	<form action="<?=base_url()?>admin/cms/set_opening_date" method="post">
            	<table>
                	<tbody>
                    	<tr>
                        	<td>Opening Date:</td>
                            <td><input type="text" value="<?=$date['opening_date']?>" name="date" id="date"/> (yyyy-mm-dd)</td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                            <td><input type="submit" class="button rounded" value="Save"/></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </p>
</div>

