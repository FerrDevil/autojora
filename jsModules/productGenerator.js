const generateProduct = (productArray, pasteSelector = '.products') => {
    productArray.forEach(product => {
        let productDOM = document.querySelector('#productGenerator').content.cloneNode(true).querySelector('.product');
        productDOM.addEventListener('click', (e) => {
            if(e.target.className == 'addToCart') return;
            document.location = 'http://localhost/AutoJora/product?id=' + product.id;
        });
        productDOM.querySelector('.productDescr').innerHTML = product.name;
        productDOM.querySelector('.productCost').innerHTML = product.cost + '&#8381;';
        productDOM.querySelector('.productPic').src = 'http://localhost/AutoJora/' + product.img;
        productDOM.querySelector('.addToCart').addEventListener('click', async (e) => {
            await postData({productId: product.id},'http://localhost/AutoJora/userCart/postCart')
            await getData('http://localhost/AutoJora/userCart', updateCart)
        })
        document.querySelector(pasteSelector).appendChild(productDOM);
    })
}

