<?php
	include 'connected.php';
	header("Access-Control-Allow-Origin: *");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}

if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
		
        $order_date_time = $_GET['order_date_time'];
        $user_id = $_GET['user_id'];
        $user_name = $_GET['user_name'];
        $gas_id = $_GET['gas_id'];
        $gas_brand_id = $_GET['gas_brand_id'];
        $gas_size_id = $_GET['gas_size_id'];
        $distance = $_GET['distance'];
        $transport = $_GET['transport'];
        $gas_brand_name = $_GET['gas_brand_name'];
        $price = $_GET['price'];
        $amount = $_GET['amount'];
        $sum = $_GET['sum'];
        $rider_id = $_GET['rider_id'];
        $payment_status = $_GET['payment_status'];
        $status = $_GET['status'];

		
							
		$sql = "INSERT INTO `order_table`(`order_id`, `order_date_time`, `user_id`, `user_name`, `gas_id`, `gas_brand_id`, `gas_size_id`, `distance`, `transport`, `gas_brand_name`, `price`, `amount`, `sum`, `rider_id`, `payment_status`, `status`) VALUES (Null,'$order_date_time','$user_id','$user_name','$gas_id','$gas_brand_id','$gas_size_id','$distance','$transport','$gas_brand_name','$price','$amount','$sum','$rider_id','$payment_status','$status')";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome AddOrder data Gas";
   
}
	mysqli_close($link);
?>