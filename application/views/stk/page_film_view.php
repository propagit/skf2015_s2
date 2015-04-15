<div class="search-results page-film-wrap">

 <?php
	$row_counter = 0;
	foreach($films as $film){
		$genres = $this->film_model->get_film_genres($film['id']); 
		$genre = $genres ? implode('/', array_column($genres, 'name')) : '';
?>
	<div class="col-md-6 search-block">
		<a href="<?=base_url()?>details/<?=$film['id']?>">
			<img src="<?=base_url() . ($film['large_image'] ? "uploads/films/" . $film['large_image'] : "img/noimage.png")?>" width="100%" />   
		</a>
		<h3><?=$film['title'];?></h3>
		<span class="genre"><?=$genre;?></span>
		<span class="running-time"><?=$film['running_time'] ? $film['running_time'] : '';?></span>
		<span class="format"><?=$film['format'] ? $film['format'] : '';?></span>
		<span class="year"><?=$film['year'] ? ',' . $film['year'] : '';?></span>
		<p class="synopsis"><?=substr($film['synopsis'],0,120) . '...';?></p>
		
		<ul class="credits">
			<li><strong>Director </strong><?=$film['director'] ? $film['director'] : ' NA ';?></li>
			<li><strong>Producer </strong><?=$film['producer'] ? $film['producer'] : ' NA ';?></li>
			<li><strong>Screenwriter </strong><?=$film['screen_writer'] ? $film['screen_writer'] : ' NA ';?></li>
			<li><strong>DOP </strong><?=$film['photography_director'] ? $film['photography_director'] : ' NA ';?></li>
		</ul>
		
		<a class="more-info" href="<?=base_url();?>details/<?=$film['id'];?>">More info</a>
		<hr class="hidden-lg hidden-md">
	</div>
<?php
		echo ($row_counter % 2) ? '<div class="new-row hidden-sm hidden-xs"><hr></div>' : '';
		$row_counter++;
	}
?>
</div>