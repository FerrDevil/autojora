<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $login = $_POST['username'];
    $password = $_POST['password'];
    $profileName = $_POST['name'];
    $confirmPassword = $_POST['confirmPassword'];
    
    if ($query->num_rows > 0){
        $_SESSION['errMessage'] = 'Такой пользователь уже существует';
        header('Location: ../registration/');
    }
    else if ($password == $confirmPassword){
        $conn->query("INSERT INTO `users` (`id`, `login`, `password`, `profileName`, `profilePic`, `email`) VALUES (NULL, '$login', '$password', '$profileName', '', '$email')");
        $query = $conn->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        $_SESSION['userId'] = (string) $query->fetch_assoc()['id'];
        header('Location: ../');
    }
    else{
        $_SESSION['errMessage'] = 'Пароли не совпадают';
        header('Location: ../registration/');
    }
  

?>