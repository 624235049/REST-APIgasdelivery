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
			
		$gas_id = $_GET['gas_id'];
        $gas_size_id = $_GET['gas_size_id'];
		$gas_brand_id = $_GET['gas_brand_id'];
        $path_image = $_GET['path_image'];
		$price = $_GET['price'];
        $quantity = $_GET['quantity'];

		$sql = "UPDATE `gas` SET `gas_id`='$gas_id',`gas_brand_id`='$gas_brand_id',`gas_size_id`='$gas_size_id',`path_image`='$path_image',`price`='$price',`quantity`='$quantity' WHERE gas_id = '$gas_id'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Edit API PPS Gas";
   
}

	mysqli_close($link);
?>