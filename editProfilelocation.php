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
			
		$user_id = $_GET['id'];
        $avatar = $_GET['Avatar'];
        $name = $_GET['Name'];
		$user = $_GET['User'];
        $password = $_GET['Password'];
        $phone = $_GET['Phone'];
        $address = $_GET['Address'];
        $lat = $_GET['Lat'];
        $lng = $_GET['Lng'];

		$sql = "UPDATE `usertable` SET `id`='$user_id',`Avatar`='$avatar',`Name`='$name',`User`='$user',`Password`='$password',`Phone`='$phone',`Address`='$address',`Lat`='$lat',`Lng`='$lng' WHERE id = '$user_id'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Edit Profile Location PPS Gas";
   
}

	mysqli_close($link);
?>