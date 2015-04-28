<?php
	$genres = $this->film_model->get_film_genres($film['id']); 
	$genre = $genres ? implode(' / ', array_column($genres, 'name')) : '';
?>
<div class="col-md-6 search-block film">
    <a href="<?=base_url()?>details/<?=$film['id']?>">
        <img src="<?=base_url() . ($film['large_image'] ? "uploads/films/" . $film['large_image'] : "frontend-assets/img/core/default-placeholder.png")?>" width="100%" />   
    </a>
    <h3 class="add-top-padding"><?=$film['title'];?></h3>
    <span class="genre"><?=$genre;?></span>
    <span class="running-time"><?=$film['running_time'] ? $film['running_time'] . ($film['year'] ? ', ' : '') : '';?></span>
    <span class="format"><?=$film['format'] ? $film['format'] : '';?></span>
    <span class="year"><?=$film['year'] ? $film['year'] : '';?></span>
    <p class="synopsis"><?=substr($film['synopsis'],0,120) . '...';?></p>
    
    <ul class="credits">
        <?=$film['director'] ? '<li><strong>Director </strong>' . $film['director'] . '</li>' : '';?>
        <?=$film['producer'] ? '<li><strong>Producer </strong>' . $film['producer'] . '</li>' : '';?>
        <?=$film['screen_writer'] ? '<li><strong>Screenwriter </strong>' . $film['screen_writer'] . '</li>' : '';?>
        <?=$film['photography_director'] ? '<li><strong>DOP </strong>' . $film['photography_director'] . '</li>' : '';?>
        <?=$film['artist'] ? '<li><strong>Artist </strong>' . $film['artist'] . '</li>' : '';?>
    </ul>
    
    <a class="more-info" href="<?=base_url();?>details/<?=$film['id'];?>">More info</a>
    <hr class="hidden-lg hidden-md">
</div>
