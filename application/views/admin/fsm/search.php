<script>
$j(function() { 
	getfilms();
});
function settype() {
	var keyword = $j('#keyword').val();
	var type = $j('#type').val();
	$j.ajax({
		url: '<?=base_url()?>admin/fsm/set_type',
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
		url: '<?=base_url()?>admin/fsm/getfilms',
		type: 'POST',
		data: ({row:'<?=$this->uri->segment(3)?>'}),
		dataType: "html",
		success: function(html) {
			$j('#films-list').html(html);
		}
	})	
}
function switchstatus(id) {
	$j.ajax({
		url: '<?=base_url()?>admin/fsm/switchstatus',
		type: 'POST',
		data: ({id:id}),
		dataType: "html",
		success: function(html) {
			$j('#stat-' + id).attr('src','<?=base_url()?>img/admin/published' + html + '.png');
		}
	})	
}
function deletefilm(id) {
	if (confirm('This will delete this film/sound from database. Are you sure you want to continue?')) {
		window.location = '<?=base_url()?>admin/fsm/deletefilm/' + id;
	}
}
</script>
<h1>Film/Sound Management</h1>
<div class="bar">
    <div class="text">Search Films/Sounds</div>
    <div class="cr"></div>
</div>
<div class="box">
	<dl class="film">
    	<dt>Keyword</dt>
    	<dd><input type="text" class="textfield rounded" id="keyword" onkeydown="settype()" onkeyup="settype()" onkeypress="settype()" value="<?=$this->session->userdata('a_keyword')?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Filter by</dt>
        <dd>
        	<select id="type" onchange="settype()">
            	<option value="0">Any type</option>
            	<option value="1"<?php if($this->session->userdata('a_type') == 1) print ' selected="selected"'; ?>>Film</option>
                <option value="2"<?php if($this->session->userdata('a_type') == 2) print ' selected="selected"'; ?>>SoundKILDA</option>
                <option value="3"<?php if($this->session->userdata('a_type') == 3) print ' selected="selected"'; ?>>Top 100</option>
            </select>
        </dd>
    </dl><dl></dl>
</div>
<hr />
<div class="box bgw">	
    <div id="films-list">
  	</div>
</div>
