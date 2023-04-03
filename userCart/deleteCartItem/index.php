<?php
	session_start();
	require_once '../../phpModules/connect.php';

	header('Content-Type: application/json');
	if($_SESSION['userId']){
        $resp = (array) json_decode(file_get_contents('php://input'));
		$resp = $resp['productId'];
        $conn->query("DELETE FROM carts WHERE userId = ". $_SESSION['userId'] ." AND id = " . $resp."");
		echo json_encode(['response'=> 200]);
	}
	else{
		echo json_encode(['response'=> 404]);
	}
	
?>