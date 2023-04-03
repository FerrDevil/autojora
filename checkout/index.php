<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://localhost/AutoJora/imgs/logo.ico" type="image/x-icon">
    <title>Заказ | АвтоЖора</title>
    <link rel="stylesheet" href="index.css">
    <script src="../jsModules/restModules.js" defer></script>
    <script src="../jsModules/categories.js" defer></script>
    <script src="../jsModules/searchBar.js" defer></script>
    <script src="../jsModules/cart.js" defer></script>
    <script src="index.js" defer></script>
</head>
<body>
    <?php
        require_once '../header.php';
    ?>
    <main>
        
        <div class="checkout">
            <h1>Ваш заказ</h1>
            
            <div class="checkoutBody">
            <p class = "emptyCheckout">Корзина пуста</p>
                <div class='total'>
                    <div class="checkoutItems">
                        <template id="checkoutProduct">
                            <a class="checkoutProduct" href = '#'>
                                <img class="checkoutProductImg" src = '#'>
                                <div class="checkoutProductInfo">
                                    <h1 class="checkoutProductName">name</h1>
                                    <button class="deleteCheckoutItem">Удалить из корзины</button>
                                </div>
                            </a>
                        </template>
                    </div>
                    <div class="checkoutPrice">
                        <p class="NDS">Все цены включают в себя НДС</p>
                        <h2 class="totalPrice"></h2>
                    </div>
                </div>
                
                <form class="checkoutSummary">
                    <div class="paymentType">
                        <label for="paymentMethod">Способ оплаты:</label>
                        <select required class="paymentInput paymentMethod" name="paymentMethod" id="paymentMethod">
                            <option value="card">Карта</option>
                            <option value="yandex">ЯндексКошелек</option>
                            <option value="card">Qiwi</option>
                        </select>
                        <input required class="paymentInput" type="text" placeholder="Введите номер">
                    </div>
                    
                    <div class="checkoutTotal">
                        <div class="checkoutSum"></div>
                        <input class="pay" type="submit" value="Оформить заказ">
                    </div>
                    
                    
                    
                </form>
            </div>
            
        </div>
        
    </main>
</body>
</html>