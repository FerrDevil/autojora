<?php 
    require_once '../phpModules/connect.php';
    $result = $conn->query("SELECT * FROM categories");
    $categories = [];
    while($category = $result->fetch_assoc()){
      $categories[] = $category;
    }
    header('Content-Type: application/json');
    echo json_encode($categories);

?>