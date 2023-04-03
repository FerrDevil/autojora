const updateCart = (cart) => {
    let emptyCart = document.querySelector('.emptyCart')
    let summary = document.querySelector('.summary');
    document.querySelector('.currentCountCart').textContent = cart.length;
    emptyCart.style.display = 'none';
    summary.style.display = 'flex';
    document.querySelectorAll('.cartProduct').forEach(cartProduct => {cartProduct?.remove()})
    if(cart.length == 0){
        emptyCart.style.display = 'inline-block';
        summary.style.display = 'none';
    }
    else{
    document.querySelector('.count').textContent = `${cart.length} товар${11 <= cart.length % 100 && cart.length & 100 <= 19 ? 'ов' : cart.length % 10 == 1 && cart.length % 100 != 11 ? '':  1 < cart.length % 10 &&  cart.length % 10 <= 4? 'а': 'ов'} добавлен${cart.length % 10 != 1 || cart.length % 100 == 11 ? 'о': ''}`;
    document.querySelector('.sum').innerHTML = cart.reduce((sum, product) => (sum += Number(product.cost.replace('&#8381;', ''))), 0) + '&#8381;';
    cart.forEach((product, productIndex) => {
        let cartProductDOM = document.querySelector('#cartProduct')?.content.cloneNode(true).querySelector('.cartProduct');
        cartProductDOM.querySelector('.cartProductImg').src = 'http://localhost/AutoJora/' + product.img;
        cartProductDOM.onclick = (e) => {
            e.preventDefault();
            if(e.target.classList.contains('deleteItem')) return;
            document.location = 'http://localhost/AutoJora/product/?id=' + product.productId;
        } 
        cartProductDOM.querySelector('.cartProductName').textContent = product.name;
        cartProductDOM.querySelector('.deleteItem').id = productIndex;
        cartProductDOM.querySelector('.deleteItem').addEventListener('click', async (e) => {
            await deleteData({productId: product.id}, 'http://localhost/AutoJora/userCart/deleteCartItem')
            await getData('http://localhost/AutoJora/userCart', updateCart)
            if(document.querySelector('.checkout') !== null){
                await getData('http://localhost/AutoJora/userCart', updateCheckout)
            }  
        }) 
        document.querySelector('.cartItems')?.appendChild(cartProductDOM)
        })
    }
}


if(document.querySelector('.login') == null) {

    getData('http://localhost/AutoJora/userCart', (cart) =>  {document.querySelector('.currentCountCart').textContent = cart.length})

    let cartContentDOM = document.querySelector('.cartContent')
    document.querySelector('.cartIcon')?.addEventListener('click', () => {
        let emptyCart = document.querySelector('.emptyCart')
        emptyCart.style.display = 'none';
        document.querySelectorAll('.cartProduct').forEach(cartProduct => {cartProduct?.remove()})
        getData('http://localhost/AutoJora/userCart', updateCart)
        cartContentDOM.style.display = 'flex';
        document.querySelector('.cartShadow').style.display = 'block';
        
    })
    document.querySelector('.cartShadow')?.addEventListener('click', () => {
        cartContentDOM.style.display = 'none';
        document.querySelector('.cartShadow').style.display = 'none';
    })
}
else{
    document.querySelector('.cartIcon').addEventListener('click', () => {
        document.querySelector('.loginToProcede').style.display = 'flex';
        document.querySelector('.cartShadow').style.display = 'flex';
    })
    document.querySelector('.cartShadow').addEventListener('click', () => {
        document.querySelector('.loginToProcede').style.display = 'none';
        document.querySelector('.cartShadow').style.display = 'none';
    })
}
