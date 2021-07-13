<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "foodstuffs");
$search = $_GET['term'];


$sql = "SELECT `item` FROM `food` WHERE `item` LIKE '$search%' LIMIT 0,8";
$result = $mysqli->query($sql);

// $rows = array();
// while($r = mysqli_fetch_assoc($result)) {
//     $rows[] = $r;
// }

// echo json_encode($rows);

$final = "[ ";
while($r = mysqli_fetch_assoc($result)) {
    $final.='"'.print_r($r['item'], TRUE).'", ';
}
$final = rtrim($final, ", ");
$final .= "]"; 
echo $final;

?>