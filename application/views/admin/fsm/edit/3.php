<script>
var n = <?=count($sessions)?>;
function addsession() {
	$j('#sessions').append('<div id="sess-' + n + '"><div class="row2"><select name="sessions[0][]"><?php foreach($dates as $d) { ?><option value="<?=$d['date']?>"><?=date('l d M',strtotime($d['date']))?></option><?php } ?></select></div><div class="row2"><input type="text" class="textfield rounded" maxlength="5" name="sessions[1][]" /> - <input type="text" class="textfield rounded" maxlength="5" name="sessions[2][]" /></div><div class="row2"><select name="sessions[3][]"><?php foreach($venues as $v) { ?><option value="<?=$v['name']?>"><?=$v['name']?></option><?php } ?></select></div><div class="row2"><a href="javascript:deletesession(' + n + ')">delete</a></div></div>');
	n++;
}
function deletesession(i) { $j('#sess-' + i).remove(); }
</script>
<h1>Film/Sound Management</h1>
<div class="bar">
    <div class="text">Update Top 100</div>
    <div class="cr"></div>
</div>
<div class="box">
	<input type="button" class="button rounded" value="Back to Films/Sounds List" onclick="history.go(-1)" />
</div>
<hr />
<form method="post" action="<?=base_url()?>admin/fsm/updatetop" enctype="multipart/form-data">
<input type="hidden" name="film_id" value="<?=$film['id']?>" />
<div class="box bgw">
	<dl class="film">
    	<dt>Title</dt>
    	<dd><input type="text" class="textfield rounded" name="title" value="<?=$film['title']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Year</dt>
        <dd><input type="text" class="textfield rounded" name="year" value="<?=$film['year']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Running time</dt>
        <dd><input type="text" class="textfield rounded" name="running_time" value="<?=$film['running_time']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Format</dt>
        <dd><input type="text" class="textfield rounded" name="format" value="<?=$film['format']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Opening Night</dt>
        <dd><input type="checkbox" name="opening_night" <?=$film['opening_night'] ? 'checked="checked"' : '';?>/></dd>
    </dl>
    <dl class="film">
    	<dt>Genre</dt>
        <dd>
        	<?php foreach($genres as $g) { ?>
            <div class="row"><input type="checkbox" name="genres[]" value="<?=$g['id']?>"<?php if ($this->film_model->check_genre($film['id'],$g['id'])) print ' checked="checked"'; ?> /> <?=$g['name']?></div>
            <?php } ?>
        </dd>
    </dl>
    <dl class="film">
    	<dt>Producer</dt>
        <dd><input type="text" class="textfield rounded" name="producer" value="<?=$film['producer']?>" /></dd>
    </dl> 
    <dl class="film">
    	<dt>Director</dt>
        <dd><input type="text" class="textfield rounded" name="director" value="<?=$film['director']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Screen writer</dt>
        <dd><input type="text" class="textfield rounded" name="screen_writer" value="<?=$film['screen_writer']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Photography director</dt>
        <dd><input type="text" class="textfield rounded" name="photography_director" value="<?=$film['photography_director']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Animator</dt>
        <dd><input type="text" class="textfield rounded" name="animator" value="<?=$film['animator']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Cast</dt>
        <dd><input type="text" class="textfield rounded" name="cast" value="<?=$film['cast']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Synopsis</dt>
        <dd><textarea class="rounded" name="synopsis"><?=$film['synopsis']?></textarea></dd>
    </dl>
    <dl class="film">
    	<dt>Publicity blurb</dt>
        <dd><textarea class="rounded" name="publicity_blurb"><?=$film['publicity_blurb']?></textarea></dd>
    </dl>
    <dl class="film">
    	<dt>Competition Session</dt>
        <dd>
        	<div class="row3">
                <select name="competition_session">
                	<option value="0">Please select</option>
                    <?php for($i=1;$i<=16;$i++) { ?>
                    <option value="<?=$i?>"<?php if($film['competition_session'] == $i) print ' selected="selected"'; ?>><?=$i?></option>
                    <?php } ?>
                </select>
    		</div>
            <div class="row3">
            	<input type="text" class="textfield rounded" maxlength="4" name="order" value="<?=$film['order']?>" />
            </div>
        </dd>
    </dl>
    <dl class="film">
    	<dt>Sessions (<a href="javascript:addsession()">add more</a>)</dt>
        <dd id="sessions">
        <?php $n=0; foreach($sessions as $session) {
			$date = date('Y-m-d',strtotime($session['time']));
			$time = date('H:i',strtotime($session['time']));
			$finish_time = date('H:i',strtotime($session['finish_time']));
			$venue = $session['venue']; ?>
            <div id="sess-<?=$n?>">
                <div class="row2">
                    <select name="sessions[0][]">
                    <?php foreach($dates as $d) { ?>
                        <option value="<?=$d['date']?>"<?php if($date == $d['date']) print ' selected="selected"'; ?>><?=date('l d M',strtotime($d['date']))?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="row2">
                    <input type="text" class="textfield rounded" maxlength="5" name="sessions[1][]" value="<?=$time?>" /> -
                    <input type="text" class="textfield rounded" maxlength="5" name="sessions[2][]" value="<?=$finish_time?>" />
                </div>
                <div class="row2">
                    <select name="sessions[3][]">
                    <?php foreach($venues as $v) { ?>
                        <option value="<?=$v['name']?>"<?php if($venue == $v['name']) print ' selected="selected"'; ?>><?=$v['name']?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="row2">
                	<a href="javascript:deletesession(<?=$n?>)">delete</a>
                </div>
            </div>
        <?php $n++; } ?>
        </dd>
    </dl>
    <dl class="film">
    	<dt>Small image</dt>
        <dd><input type="file" name="small_image" /> (221px width x 150px height)
        <?php if($film['small_image'] != "") { ?><br /><br />
        <img src="<?=base_url()?>uploads/films/<?=$film['small_image']?>" alt="" width="100%"/>
        <?php } ?>
        </dd>
    </dl>
    <dl class="film">
    	<dt>Large image</dt>
        <dd><input type="file" name="large_image" /> (365px width x 249px height)
        <?php if($film['large_image'] != "") { ?><br /><br />
        <img width="100%" src="<?=base_url()?>uploads/films/<?=$film['large_image']?>" alt="" />
        <?php } ?>
        </dd>
    </dl>
     <dl class="film">
    	<dt>Facebook link</dt>
        <dd><input type="text" class="textfield rounded" name="facebook" value="<?=$film['facebook']?>" /></dd>
    </dl>
     <dl class="film">
    	<dt>Twitter link</dt>
        <dd><input type="text" class="textfield rounded" name="twitter" value="<?=$film['twitter']?>" /></dd>
    </dl>
    <dl class="film">
    	<dt>Blogger link</dt>
        <dd><input type="text" class="textfield rounded" name="blogger" value="<?=$film['blogger']?>" /></dd>
    </dl>
    <dl class="film">
        <dt>Youtube link</dt>
        <dd><input type="text" class="textfield rounded" name="youtube" value='<?=$film['youtube']?>' />
        <? if($film['youtube']<>''){?>
        <br><br>
        <iframe width="400" height="270" src="
		<?php
		$youtube_id = $film['youtube'];
		
		if(strpos($youtube_id,'youtu.be') > 0)
		{
			//youtube
			$pos = strpos($youtube_id,'e/');
			$youtube_id = substr($youtube_id,$pos+2,strlen($youtube_id)-$pos);
			echo 'http://www.youtube.com/embed/'.$youtube_id;			
		}
		else if(strpos($youtube_id,'vimeo') > 0)
		{
			
			$pos1 = strpos($youtube_id,'video/');
			$pos2 = strpos($youtube_id,'?');
			$youtube_id = substr($youtube_id,$pos1+6,($pos2-($pos1+6)));
			echo 'http://player.vimeo.com/video/'.$youtube_id;	
		}
		
		//$pos = strpos($youtube_id,'e/');
		//$youtube_id = substr($youtube_id,$pos+2,strlen($youtube_id)-$pos);
        //echo 'http://www.youtube.com/embed/'.$youtube_id;	
		?>
        " frameborder="0" allowfullscreen></iframe>
        <?}?>
        </dd>
    </dl>
    <dl class="film">
    	<dt>Featuring</dt>
        <dd><input type="checkbox"  name="featuring" <? if($film['featuring'] == 1) { echo 'checked="true"';}?> /></dd>
    </dl>
    <dl></dl>
</div>
<hr />
<div class="box">
	<dl class="film">
    	<dt>&nbsp;</dt>
        <dd><input type="submit" class="button rounded" value="Update Film" /></dd>
    </dl><dl></dl>
</div>
</form>