<?php
    session_start();
    require_once 'connect.php';
    $date = date("Y-m-d");
    $productId = $_POST['productId'];
    $reviewContent = $_POST['reviewText'];
    $rating = $_POST['star'];
    $conn->query("INSERT INTO `reviews` (`id`, `productId`, `userId`, `reviewContent`, `date`, `rating`) VALUES (NULL, '$productId', '" . $_SESSION['userId'] . "', '$reviewContent', '$date', '$rating')");
    header('Location: ../product/?id=' . $productId);
?>