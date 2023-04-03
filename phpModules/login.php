<?php
    session_start();
    require_once 'connect.php';


    $login = trim($_POST['username']);
    $password = trim($_POST['password']);
    $query = $conn->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (!$query->num_rows){
        $_SESSION['errMessage'] = 'Неверно введены логин или пароль';
        header('Location: ../login/');
    }
    else{
        $_SESSION['userId'] = (string) $query->fetch_assoc()['id'];
        header('Location: ../');
    }
    
?>