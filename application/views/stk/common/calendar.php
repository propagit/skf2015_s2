<?php 
	$prev_mth = array(27,28,29,30);
	
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
	<h4>what's on <span>May 2015</span></h4>
	
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
				foreach($calender as $cal){ 
					if($count >= 7){
						# reached 7 days break the cycle and start new row
						$count = 0;
						echo '</tr><tr>';	
					}
					echo '<td>' . $cal . '</td>';
					$count++;
				} 
			?>
           	</tr>
        </tbody>
    </table>

</div>