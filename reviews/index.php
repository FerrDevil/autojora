<?php 
    require_once '../phpModules/connect.php';
    $result = $conn->query("SELECT * FROM users INNER JOIN reviews on users.id = reviews.userId");
    $reviews = [];
    while($review = $result->fetch_assoc()){
        $review['login'] = '';
        $review['password'] = '';
        $reviews[] = $review;
    }
    header('Content-Type: application/json');
    echo json_encode($reviews);

?>