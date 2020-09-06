<?php
	
	$yeah = date("Y");
	$month = date("m");

	$lastDay = date('j',mktime(0,0,0,$month + 1,0,$yeah)); 

	$aryWeek = ['日', '月', '火', '水', '木', '金', '土'];

	$calendar = [];
	$j = 0;
	$day = 0;

	for($i = 1; $i <$lastDay+1; $i++){
		$week = DATE('w',mktime(0,0,0,$month,$i,$yeah));
		
		if ($i===1){
			for($s = 1; $s <= $week; $s++){
				$calendar[$j][$day] = '';
				$day++;
			}
		}

		if($day === 7){
			$j++;
			$day = 0;
		}
		$calendar[$j][$day] = $i;
		$day++;

		if($i == $lastDay){
			for( $e = 1; $e <=6 -$week; $e++){
				$calendar[$j][$day] = '';
				$day++;
			}
		}
	}
?>
<table class="calendar">
	<?php 
		echo '<tr>';

			foreach($aryWeek as $week){
				echo "<th>{$week}</th>";
			}

			foreach($calendar as $date){
				echo '<tr>';
					foreach($date as $oneday){
						if ($oneday == date('j')){
							echo '<td class = "today">'.$oneday.'</td>';
						 }else{
							echo "<td>{$oneday}</td>";
						 }
					 }
		echo '</tr>';
			 }
	?>
</table>
<table class="calendar">
	<tr>
		<?php foreach($aryWeek as $week){?>
			<th><?php echo $week?></th>
		<?php }?>
	</tr>
	<?php foreach($calendar as $date){?>
		<tr>
			<?php foreach($date as $oneday){?>
				<?php if ($oneday == date('j')){?>
					<td class = "today"><?php echo $oneday?></td>
				<?php }else{?>	
					<td><?php echo $oneday?></td>
				<?php }?>
			<?php }?>
		</tr>
	<?php }?>
</table>


<style type="text/css">

table.calendar td.today{
	background-color:#fbffa3;
	font-weight:bold;
}

.calendar{
	width:50%;
}

.calendar th:first-of-type,.calendar td:first-of-type{
	background-color: #ffefef;
	color: #FF0000;
	font-weight: bold;
}

.calendar th:last-of-type,.calendar td:last-of-type{
	background-color:  #ededff;
	color: #0000FF;
	font-weight: bold;
}

.calendar th,.calendar td{
	padding: 8px;
	background-color: #FFF;
	text-align: center;
	border: 1px solid #CCC;
}