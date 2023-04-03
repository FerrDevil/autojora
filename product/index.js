

const createRating = (rating, container) => {
    for(let fullStar = 0; fullStar < rating; fullStar++){
        let star = document.createElement('img');
        star.className = 'star';
        star.src = '../imgs/fullStar.svg';
        container.appendChild(star)
    }
    for(let emptyStar = 0; emptyStar < 5 - rating; emptyStar++){
        let star = document.createElement('img');
        star.className = 'star';
        star.src = '../imgs/emptyStar.svg';
        container.appendChild(star)
    }
} 
const getProduct = (products) => {
    let productId = decodeURI(document.location.search.replace('?id=', ''));
    let product = products.filter(product => product.id == productId)[0];
    document.title = product.name +' | АвтоЖора';
    document.querySelector('.productName').textContent = product.name;
    document.querySelector('.productIcon').src = 'http://localhost/AutoJora/' +product.img;
    document.querySelector('.productCost').innerHTML = product.cost + ' &#8381;';
    document.querySelector('.descriptionBody').innerHTML = product.description;
    document.querySelector('.characteristicsBody').innerHTML = product.characteristics;
    document.querySelector('.addToCart').addEventListener('click', async () => {
        await postData({productId: product.id},'http://localhost/AutoJora/userCart/postCart')
        await getData('http://localhost/AutoJora/userCart/', updateCart)
    })
    
}

getData('http://localhost/AutoJora/products/', getProduct)

const getReviews = (reviews) => {
    reviews = reviews.filter(review => review.productId == decodeURI(document.location.search.replace('?id=', '')))
    if (reviews.length == 0){
        document.querySelector('.noReviews').style.display = 'inline';
        return;
    }
    console.log(reviews)
    reviews.forEach(review => {
        let reviewDOM = document.querySelector('#review').content.cloneNode('true').querySelector('.review');
        reviewDOM.querySelector('.profilePic').src = review.profilePic == '' ? 'http://localhost/AutoJora/imgs/defaultAccount.svg': review.profilePic;
        reviewDOM.querySelector('.profileName').textContent = review.profileName;
        reviewDOM.querySelector('.reviewDate').textContent = review.date.split('-').reverse().join('.');
        createRating(review.rating, reviewDOM.querySelector('.reviewRating'));
        reviewDOM.querySelector('.reviewContent').innerHTML = review.reviewContent;
        document.querySelector('.reviews').appendChild(reviewDOM)
    })
}

getData('http://localhost/AutoJora/reviews/', getReviews)

document.querySelector('.writeReview').addEventListener('click', () => {
    document.querySelector('.reviewForm').style.display = document.querySelector('.reviewForm').style.display == 'flex' ? 'none': 'flex';
})

document.querySelectorAll('.setRatingStar').forEach(ratingStar => {
    let ratingStarImg = ratingStar.querySelector('.star')
    ratingStarImg.addEventListener('click', () => {
        let checkedStar = ratingStar.querySelector('.starInput');
        checkedStar.checked = true;
        document.querySelectorAll('.setRatingStar').forEach(star => {
            star.querySelector('.star').src = star.querySelector('.starInput').value <= checkedStar.value? '../imgs/fullStar.svg': '../imgs/emptyStar.svg';
        })
    })
})

document.querySelector('.productId').value = decodeURI(document.location.search.replace('?id=', ''));
