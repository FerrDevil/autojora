<?php
    session_start();
    require_once '../phpModules/connect.php';

	header('Content-Type: application/json');
	if($_SESSION['userId']){
        $result = $conn->query("SELECT * FROM products INNER JOIN carts ON carts.productId = products.id WHERE `userId` = ". $_SESSION['userId'] ."");
        
        $products = [];
        while($cart = $result->fetch_assoc()){
            $products[] = $cart;
        }

		echo json_encode($products);
	}
	else{
		echo json_encode(['response'=> 404]);
	}
	
?>