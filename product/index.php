<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товар | АвтоЖора</title>
    <link rel="shortcut icon" href="http://localhost/AutoJora/imgs/logo.ico" type="image/x-icon">
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
        <div class="product">
            <div class="mainInfo">
                <h1 class="productName">productName</h1>
                <img class="productIcon" src="#" alt = 'productIcon'>
                <div class="description">
                    <h1 class="descriptionH">Описание</h1>
                    <p class="descriptionBody">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum vitae aliquid sunt nemo at itaque recusandae asperiores quasi accusamus veniam.</p>
                </div>
                <div class="characteristics">
                    <h1 class="characteristicsH">Характеристики</h1>
                    <p class="characteristicsBody">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum vitae aliquid sunt nemo at itaque recusandae asperiores quasi accusamus veniam.</p>
                </div>
                <div class="reviews">
                    <h1 class="reviewH">Отзывы о товаре</h1>
                    <button class="writeReview">Оставить отзыв</button>
                    <form class="reviewForm" action="../phpModules/review.php" method="post">
                        <input class="productId" name='productId'>
                        <textarea required class="reviewText" name='reviewText' resize="none" placeholder="Напишите, что думаете"></textarea>
                        <div class="setRating">
                            <div class="setRatingStar star1">
                                <input required class="starInput" value="1" type ='radio' name="star">
                                <img class="star" src="../imgs/emptyStar.svg">
                            </div>
                            <div class="setRatingStar star2">
                                <input required class="starInput" value="2" type ='radio' name="star">
                                <img class="star" src="../imgs/emptyStar.svg">
                            </div>
                            <div class="setRatingStar star3">
                                <input required class="starInput" value="3" type ='radio' name="star">
                                <img class="star" src="../imgs/emptyStar.svg">
                            </div>
                            <div class="setRatingStar star4">
                                <input required class="starInput" value="4" type ='radio' name="star">
                                <img class="star" src="../imgs/emptyStar.svg">
                            </div>
                            <div class="setRatingStar star5">
                                <input required class="starInput" value="5" type ='radio' name="star">
                                <img class="star" src="../imgs/emptyStar.svg">
                            </div>
                        </div>
                        <input class="sendReview" type="submit" value="Отправить">
                    </form>
                    <template id="review">
                        <div class="review">
                            <div class="reviewTitle">
                                <div class="userInfo">
                                    <img class="profilePic" src="#" alt="profilePic">
                                    <h2 class="profileName">profileName</h2>
                                </div>
                                <div class="reviewInfo">
                                    <div class="reviewDate"></div>
                                    <div class="reviewRating"></div>
                                </div>
                            </div>
                            
                            <div class="reviewContent"></div>
                        </div>
                    </template>
                <p class="noReviews">На данный момент отзывов для данного товара нет</p>
                </div>
            </div>
           
            <div class="buyProduct">
                <div class="productCost">123</div>
                <div class="addToCart">Добавить в корзину</div>
            </div>
            
        </div>
    </main>
</body>
</html>