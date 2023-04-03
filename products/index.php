<?php 
    require_once '../phpModules/connect.php';
    $result = $conn->query("SELECT * FROM products");
    $products = [];
    while($product = $result->fetch_assoc()){
      $products[] = $product;
    }
    header('Content-Type: application/json');
    echo json_encode($products);

?>