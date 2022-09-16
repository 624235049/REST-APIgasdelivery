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
			
		$gas_brand_id = $_GET['gas_brand_id'];
        $gas_brand_name = $_GET['gas_brand_name'];
        $gas_brand_image = $_GET['gas_brand_image'];

		$sql = "UPDATE `gas_brand` SET `gas_brand_id`='$gas_brand_id',`gas_brand_name`='$gas_brand_name',`gas_brand_image`='$gas_brand_image' WHERE gas_brand_id = '$gas_brand_id'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Edit API Brand Gas";
   
}

	mysqli_close($link);
?>