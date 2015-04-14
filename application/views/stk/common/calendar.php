<?php 
	$event_starts = 21;
	$event_ends = 30;
	$prev_mth = array(27,28,29,30);
	
	$events = array(
						21 => base_url().'page-237/2015-festival-calendar.html#thu21',
						22 => base_url().'page-237/2015-festival-calendar.html#fri22',
						23 => base_url().'page-237/2015-festival-calendar.html#sat23',
						24 => base_url().'page-237/2015-festival-calendar.html#sun24',
						25 => base_url().'page-237/2015-festival-calendar.html#mon25',
						26 => base_url().'page-237/2015-festival-calendar.html#tue26',
						27 => base_url().'page-237/2015-festival-calendar.html#wed27',
						28 => base_url().'page-237/2015-festival-calendar.html#thu28',
						29 => base_url().'page-237/2015-festival-calendar.html#fri29',
						30 => base_url().'page-237/2015-festival-calendar.html#sat30',
					);
	
	$this_mth = array();
	# create calendar for month of May
	for($i = 1; $i <= 31; $i++){
		$this_mth[] = $i;	
	}
	$next_mth = array(1,2,3,4,5,6,7);
	
	# merge calender
	$calender = array_merge($prev_mth,$this_mth);
	$calender = array_merge($calender,$next_mth);
	
	
?>

<div class="calendar">
	<h4><span class="whats-on">what's on</span> <span class="pull">May 2015</span></h4>
	
    <table>
    	<thead>
        	<tr>
            	<th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
                <th>Sun</th>
            </tr>
        </thead>
        <tbody>
        	<tr>
        	<?php 
				$count = 0;
				$festival_month = false;
				$festival_month_ended = false;
				foreach($calender as $cal){ 
					if($count >= 7){
						# reached 7 days break the cycle and start new row
						$count = 0;
						echo '</tr><tr>';	
					}
					# once first of month reaches set as festival month begin
					if(!$festival_month && !$festival_month_ended && $cal == 1){
						$festival_month = true;	
					}
					
					echo '<td ' . ( $festival_month  ? (($cal >= $event_starts && $cal <= $event_ends) ? 'class="event-dates"' : 'class="festival-month"') : '' ) . '>' 
								. ( $festival_month ? (($cal >= $event_starts && $cal <= $event_ends) ? '<a href="' . $events[$cal] . '">' . $cal . '</a>' : $cal ) : $cal ) . 
						  '</td>';
					
					
					# once festival month begin, check for the month to end
					if($festival_month && $cal == 31){
						$festival_month = false;	
						$festival_month_ended = true;
					}
					
					$count++;
				} 
			?>
           	</tr>
        </tbody>
    </table>

</div>