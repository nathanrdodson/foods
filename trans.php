<?php
// $con = mysqli_connect('localhost', 'root', '');
// if (!$con) {
// 	die('Could not connect: ');
// }
$mysqli = new mysqli("localhost", "root", "", "foodstuffs");
// mysqli_select_db($con, "transaction");
$date = $_POST['keyword'];

$sql_trans_test = "SELECT * FROM `transaction` WHERE `date` LIKE '$date%' LIMIT 0,5";
$result = $mysqli->query($sql_trans_test);
$row_cnt = $result->num_rows;
// echo print_r($row_cnt);
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo json_encode($rows);
if($row_cnt > 0) {
		echo "
			<table>
				<tr>
					<td><i>Date</i></td>
					<td><i>Location</i></td>
					<td><i>Total Cost</i></td>
					<td><i>Total Saved</i></td>
					<td><i>Trans. ID</i></td>
				</tr>
			";
		foreach($rows as $row) {
			echo "
				<tr>
					<td><input type='text' id='date_rec' name='date' value=".$row['date']." disabled></td>
					<td><input type='text' id='location_rec' name='location' value=".$row['location']." disabled></td>
					<td><input type='text' id='cost_rec' name='cost' value=".$row['total_cost']." disabled></td>
					<td><input type='text' id='saved_rec' name='saved' value=".$row['total_saved']." disabled></td>
					<td><input type='text' id='transid_rec' name='transid' value=".$row['trans_id']." disabled></td>
				</tr>
			";
		}
		echo "</table>";
		
} else {
	echo "Search yielded no results...";
}	
?>