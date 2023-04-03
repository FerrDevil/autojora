<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты поиска | АвтоЖора</title>
    <link rel="shortcut icon" href="http://localhost/AutoJora/imgs/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="results.css">
    <script src="../jsModules/restModules.js" defer></script>
    <script src="../jsModules/categories.js" defer></script>
    <script src="../jsModules/searchBar.js" defer></script>
    <script src="../jsModules/cart.js" defer></script>
    <script src="../jsModules/productGenerator.js" defer></script>
    <script src="results.js" defer></script>
</head>
<body>
    <?php
        require_once '../header.php';
    ?>
    <main>
        <div class="searchPanel">
            <input class="searchPanelInput" placeholder="Искать">
            <div class="costsRange">
                <h1>Цена</h1>
                <div class="costsRangeContainer">
                    <div class="curRange"></div>
                    <input step="100" min="100" max="100000" value="100" class="range firstRange" type="range">
                    <input step="100" min="100" max="100000" value='100000' class="range secondRange" type="range">
                </div>
                <div class="rangeNumbers">
                    <div class="rangeValue rangeFrom">
                        <p class="rangeNumbersDescr">от</p>
                        <input class="rangeValueInput" type="text" value="100">
                    </div>
                    <div class="rangeValue rangeTo">
                        <p class="rangeNumbersDescr">до</p>
                        <input class="rangeValueInput" type="text" value="100000">
                    </div>
                </div>
            </div>
            <div class="categoriesCheckboxes">
                <div class="categoriesCheckbox">
                    <label for="checkbox1">Шины</label>
                    <input  class="categoriesInput" id = 'checkbox1' type="checkbox" value="1">
                </div>
                <div class="categoriesCheckbox">
                    <label for="checkbox2">Аккумуляторы</label>
                    <input  class="categoriesInput" id = 'checkbox2' type="checkbox" value="2">
                </div>
                <div class="categoriesCheckbox">
                    <label for="checkbox3">Предохранители</label>
                    <input class="categoriesInput" id = 'checkbox3' type="checkbox" value="3">
                </div>
                
                
            </div>
        </div>
        <div class="results products">
            <template id = 'productGenerator'>
                <a href="#" class="product">
                    <img class="productPic" src="#">
                    <div class="productContent">
                        <p class="productDescr">name</p>
                        <p class="productCost">cost</p>
                        <button class="addToCart">В корзину</button>
                    </div>
                </a>
            </template>
        </div>
    </main>
    
</body>
</html>