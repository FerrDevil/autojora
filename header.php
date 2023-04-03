
<header>
        <nav>
            <a class = 'logo' href="http://localhost/AutoJora"><img src="http://localhost/AutoJora/imgs/logo.png"></a>
            <ul class="navList">
                <li><div class="categories">
                    <div class="categoriesButton">
                        <img class="burger" src="http://localhost/AutoJora/imgs/burger.svg">
                        <p>Категории</p>
                    </div>

                    <div class="categoriesList">
                        <template id="category">
                        <a class="category" href="#">
                            <p class="categoryName">name</p>
                            <img class="arrow" src='http://localhost/AutoJora/imgs/rightArrow.svg'>
                        </a>
                        </template>
                        
                        
                    </div>
                </div></li>
                <div class="shadow searchShadow"></div>
                <li><div class="searchBar">
                    <input class="searchInput" placeholder="Искать">
                    <img class="search" src="http://localhost/AutoJora/imgs/search.svg">
                    <div class="searchResults">
                        <template id="optionsTemplate">
                            <a class="option" href = '#'><div>
                                <img class="optionImg" src = '#'>
                                <p class="optionName">name</p>
                            </div></a>
                        </template>
                    </div>
                </div></li>
                <li><div class="cart">
                    <img class="cartIcon" src = 'http://localhost/AutoJora/imgs/cart.svg'>
                    <span class="currentCountCart">0</span>
                    <div class="shadow cartShadow"></div>
                    <?=$_SESSION['userId'] ? '': '<div class="loginToProcede"><p>Чтобы воспользоваться корзиной, нужно <a href="http://localhost/AutoJora/login">войти</a></p></div>' ?>
                    <div class="cartContent">
                        <div class="summary">
                            <div class="summaryInfo">
                                <p>Ваша корзина покупок</p>
                                <h1 class="count"></h1>
                            </div>
                            <div class="summaryPayment">
                                <div class="sum"></div>
                                <a class="goToCheckout" href="http://localhost/AutoJora/checkout/">Оформить заказ</a>
                            </div>
                        </div>
                        <p class = "emptyCart">Корзина пуста</p>
                        <div class="cartItems"></div>
                        <template id="cartProduct">
                            <a class="cartProduct" href = '#'>
                                <img class="cartProductImg" src = '#'>
                                <div class="cartProductInfo">
                                    <h1 class="cartProductName">name</h1>
                                    <button class="deleteItem">Удалить из корзины</button>
                                </div>
                                
                            </a>
                        </template>
                    </div>
                </div></li>
                <?php
                if(!$_SESSION['userId']){
                    echo '<li><a class="login" href="http://localhost/AutoJora/login/"><img src="http://localhost/AutoJora/imgs/login.svg"></a></li>';
                }
                else{
                    echo '<li><a class="userPage" href="http://localhost/AutoJora/user/"><img src="http://localhost/AutoJora/imgs/userPage.svg"></a></li>';
                }
                ?>
                
            </ul>
        </nav>
    </header>