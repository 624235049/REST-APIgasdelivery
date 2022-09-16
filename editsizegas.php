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
			
		$gas_size_id = $_GET['gas_size_id'];
        $gas_size_name = $_GET['gas_size_name'];
        $pathImage = $_GET['pathImage'];

		$sql = "UPDATE `gas_size` SET `gas_size_id`='$gas_size_id',`gas_size_name`='$gas_size_name',`pathImage`='$pathImage' WHERE gas_size_id = '$gas_size_id'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Edit API Size Gas";
   
}

	mysqli_close($link);
?>