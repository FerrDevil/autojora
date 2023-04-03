<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>АвтоЖора</title>
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="http://localhost/AutoJora/imgs/logo.ico" type="image/x-icon">
    <script src="./jsModules/restModules.js" defer></script>
    <script src="./jsModules/categories.js" defer></script>
    <script src="./jsModules/searchBar.js" defer></script>
    <script src="./jsModules/cart.js" defer></script>
    <script src="./jsModules/slider.js" defer></script>
    <script src="./jsModules/productGenerator.js" defer></script>
    <script src="index.js" defer></script>
</head>
<body>
    <?php
        require_once 'header.php';
    ?>
        
    <main>
        <div class="salesSlider">
            <div class="sliderImgs"></div>
            <div class="sliderArrows">
                <img src="./imgs/leftArrow.svg" class="arrow leftArrow">
                <img src="./imgs/rightArrow.svg" class="arrow rightArrow">
            </div>
        </div>
        <div class="products">
            <template id = 'productGenerator'>
                <div class="product">
                    <img class="productPic" src="#">
                    <div class="productContent">
                        <p class="productDescr">name</p>
                        <p class="productCost">cost</p>
                        <button class="addToCart">В корзину</button>
                    </div>
                </div>
            </template>
        </div>
        </div>
    </main>
</body>
</html>