<div class="search-results page-film-wrap">
 <?php
	$row_counter = 0;
	foreach($films as $film){
		$data['film'] = $film;
		$this->load->view('stk/film_block',$data);
		echo ($row_counter % 2) ? '<div class="new-row hidden-sm hidden-xs"><hr></div>' : '';
		$row_counter++;
	}
?>
</div>