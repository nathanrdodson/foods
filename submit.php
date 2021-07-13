<?php
    $mysqli = mysqli_connect("localhost", "root", "", "foodstuffs");
    $date = $_POST['date'];
    $location = $_POST['location'];
    $total_cost = $_POST['cost'];
    $saved = $_POST['saved'];
    $is_trans = $_POST['is_trans'];

    $transid = $_POST['transid'];

    $item = $_POST['item'];
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $quantity = $_POST['qnty'];
    $item_cost = $_POST['item_cost'];
    $weight = $_POST['weight'];
    $department = $_POST['dept'];
    
    if(empty($is_trans)) {
        $w_trans = "INSERT INTO `food`(`item`, `brand`, `size`, `quantity`, `cost`, `trans_id`, `weight`,`department`) VALUES ('$item','$brand','$size','$quantity','$item_cost','$transid','$weight','$department');";        
        $res = mysqli_query($mysqli, $w_trans);
        echo print_r($res);   
    } else {
        // Create Transaction
        $wo_trans = "INSERT INTO `transaction` (`date`, `location`, `total_cost`, `total_saved`, `trans_id` ) VALUES ('$date','$location','$total_cost','$saved','')";
        $wo_trans_trans = "INSERT INTO `food`(`item`, `brand`, `size`, `quantity`, `cost`, `trans_id`,`weight`,`department`) VALUES ('$item','$brand','$size','$quantity','$item_cost','$transid','$weight','$department')";        
        $res = mysqli_query($mysqli, $wo_trans);
        echo print_r($res);
        $res = mysqli_query($mysqli, $wo_trans_trans);
        echo print_r($res);
    }
?>
