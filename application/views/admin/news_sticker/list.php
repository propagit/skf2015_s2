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
    	<p><a href="<?=base_url()?>admin/news_sticker/add"><img src="<?=base_url()?>img/admin/button-add-news.png" /></a></p>
</div>
    	<hr />
<div class="box bgw">
    	<div id="newslist">

    	<?php foreach($news as $article) { ?>
    	<div class="box-news" id="news_<?=$article['id']?>">
    		<div class="brief">
    			<h4><?=$article['heading']?></h4>
    			<p><?=$article['subheading']?></p>
    		</div>
    		<div class="actions">
    			<?php if($article['published']) { ?>
    				<img src="<?=base_url()?>img/icon-published.png" id="status-<?=$article['id']?>" class="status" alt="<?=$article['id']?>" />
    			<?php } else { ?>
    				<img src="<?=base_url()?>img/icon-unpublished.png" id="status-<?=$article['id']?>" class="status" alt="<?=$article['id']?>" />
    			<?php } ?>
    			<a href="<?=base_url()?>admin/news_sticker/edit/<?=$article['id']?>"><img src="<?=base_url()?>img/icon-edit.png" /></a>
    			<a href="javascript:deletenews(<?=$article['id']?>)"><img src="<?=base_url()?>img/icon-delete.png" /></a>
    		</div><dl></dl>
    	</div>
    	<?php } ?>
    	</div>
    </div>
