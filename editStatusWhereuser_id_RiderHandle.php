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
			
		$user_id = $_GET['user_id'];		
		$status = $_GET['status'];
		$emp_id = $_GET['rider_id'];
		
		
							
		$sql = "UPDATE `order_table` SET `status` = '$status',`rider_id` = '$emp_id' WHERE user_id = '$user_id'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "update status where user_id";
   
}

	mysqli_close($link);
?>