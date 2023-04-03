<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация | АвтоЖора</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
        *{
            margin: 0%;
            padding: 0%;
            font-family: 'Open Sans', sans-serif;
        }
        main{
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .login{
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            row-gap: 3vh;
        }
        .logo{
            object-fit: cover;
            width: 3rem;
            height: 3rem;
        }
        .loginForm{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            row-gap: 3vh;
        }
        .inputAnimation{
            position: relative;
           
        }
        .animationInput{
            border: 1px solid #000;
            padding: 5px;
            border-radius: 5px;
            width: max(200px, 20vw);
            height: 1.5rem;
        }
        .animationLabel{
            left: 20px;
            top: 0.3rem;
            font-size: 1.1rem;
            position: absolute;
            transition: top 0.2s;
        }
        .animationInput:focus   ~ .animationLabel,
        .animationInput:not(:placeholder-shown).animationInput:not(:focus) ~ .animationLabel{
            top:-8px;
            font-size: 1rem;
            background-color: #fff;
            padding: 0 1px;
        }
        .showPassword, .showСonfirmPassword{
            position: absolute;
            right: 10px;
            top: 8px;
            width: 1.2rem;
            height: 1.2rem;
        }
        .loginSubmit{
            width: 197px;
            height: 5vh;
            border: 1px solid #000;
            border-radius: 5px;
            background-color: #fff;
            font-size: 1.2rem;
            text-align: center;
        }
        .loginSubmit:hover{
            border-color: #4169E1;
        }
        .errorMessage{
            border: 1px solid #ff1100;
            border-radius: 10px;
            padding: 1vh 1vw;
            position: absolute;
            text-align: center;
            width: 20vw;
            top: 100%;
            transform: translate(-50%, 50%);
            left: 50%;
        }
    </style>
    <link rel="shortcut icon" href="http://localhost/AutoJora/imgs/logo.ico" type="image/x-icon">
</head>
<body>
    <main>
        <div class="login">
            <img src="http://localhost/AutoJora/imgs/logo.png" class="logo" alt="logo">
            <form class="loginForm" action="../phpModules/registration.php" method="POST">
                <div class="email inputAnimation">
                    <input required class="animationInput" id = 'email' type="email" name='email'  placeholder=" ">
                    <label class="animationLabel" for="email">Эл. почта</label>
                </div>
                <div class="username inputAnimation">
                    <input required class="animationInput" id = 'username' type="text" name='username' placeholder=" ">
                    <label class="animationLabel" for="username">Логин</label>
                </div>
                <div class="name inputAnimation">
                    <input required class="animationInput" id = 'username' type="text" name='username'  placeholder=" ">
                    <label class="animationLabel" for="name">Имя</label>
                </div>
                <div class="password inputAnimation">
                    <input required class="animationInput" id = 'password' type="password" name='password'  placeholder=" ">
                    <label class="animationLabel" for="password">Пароль</label>
                    <img class="showPassword" src = '../imgs/showPassword.svg' alt="off">
                </div>
                <div class="confirmPassword inputAnimation">
                    <input required class="animationInput" id = 'confirmPassword' type="password" name='confirmPassword'  placeholder=" ">
                    <label class="animationLabel" for="confirmPassword">Подтверждение</label>
                    <img class="showСonfirmPassword" src = '../imgs/showPassword.svg' alt="off">
                </div>
                <input class="loginSubmit" type="submit" value="Зарегистрироваться">
                <a href="../login/">Уже зарегистрированы? Войдите</a>
            </form>
            <?php
            if($_SESSION['errMessage']){
               echo '<div class="errorMessage">' . $_SESSION["errMessage"] .'</div>';
               unset($_SESSION['errMessage']);
            }   
            ?>
        </div>
    </main>
    <script>
        document.querySelector('.showPassword').addEventListener('click', () => {
            let passwordDOM = document.querySelector('.password').querySelector('#password');
            passwordDOM.type = passwordDOM.type == 'password'? 'text': 'password';
            document.querySelector('.showPassword').alt = document.querySelector('.showPassword').alt == 'off'? 'on': 'off';
            let path = document.querySelector('.showPassword').src.split('/');
            document.querySelector('.showPassword').src =  path[path.length - 1] == 'showPassword.svg'? '../imgs/hidePassword.svg': '../imgs/showPassword.svg';
        })

        document.querySelector('.showСonfirmPassword').addEventListener('click', () => {
            let passwordDOM = document.querySelector('.confirmPassword').querySelector('#confirmPassword');
            passwordDOM.type = passwordDOM.type == 'password'? 'text': 'password';
            document.querySelector('.showСonfirmPassword').alt = document.querySelector('.showСonfirmPassword').alt == 'off'? 'on': 'off';
            let path = document.querySelector('.showСonfirmPassword').src.split('/');
            document.querySelector('.showСonfirmPassword').src =  path[path.length - 1] == 'showPassword.svg'? '../imgs/hidePassword.svg': '../imgs/showPassword.svg';
        });
       
        
    </script>
</body>
</html>