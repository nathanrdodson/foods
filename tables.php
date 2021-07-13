<?php

$mysqli = new mysqli("localhost", "root", "", "foodstuffs");

$sql = "SELECT * FROM `food` ORDER BY `fid` DESC";
$result = $mysqli->query($sql);
$row_cnt = $result->num_rows;
// echo print_r($row_cnt);
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$rows = mysqli_fetch_all ($result, MYSQLI_ASSOC);
// echo json_encode($rows);
if($row_cnt > 0) {
		echo "
			<table>
				<tr>
					<td><i>Item</i></td>
					<td><i>Brand</i></td>
					<td><i>Size</i></td>
					<td><i>Quantity</i></td>
					<td><i>Item Cost</i></td>
					<td><i>Weight</i></td>
					<td><i>Department</i></td>
					<td><i>Transaction ID</i></td>
					<td><i>FID</i></td>
				</tr>
			";
		foreach($rows as $row) {
			echo "
				<tr>
					<td>".$row['item']."</td>
					<td>".$row['brand']."</td>
					<td>".$row['size']."</td>
					<td>".$row['quantity']."</td>
					<td>".$row['cost']."</td>
					<td>".$row['weight']."</td>
					<td>".$row['department']."</td>
					<td>".$row['trans_id']."</td>
					<td>".$row['fid']."</td>
				</tr>
			";
		}
		echo "</table>";
		
}
?>