const updateCheckout = (cart) => {
    let emptyCheckout = document.querySelector('.emptyCheckout')
    emptyCheckout.style.display = 'none';
    document.querySelectorAll('.checkoutProduct').forEach(cartProduct => {cartProduct?.remove()})
    if(cart.length == 0){
        emptyCheckout.style.display = 'inline-block';
        document.querySelector('.total').style.display = 'none';
    }
    else{
        document.querySelector('.totalPrice').innerHTML = 'полная сумма: ' + cart.reduce((sum, product) => (sum += Number(product.cost.replace('&#8381;', ''))), 0) + '&#8381;';
        document.querySelector('.checkoutSum').innerHTML = cart.reduce((sum, product) => (sum += Number(product.cost.replace('&#8381;', ''))), 0) + '&#8381;';
        cart.forEach((product, productIndex) => {
            let cartProductDOM = document.querySelector('#checkoutProduct').content.cloneNode(true).querySelector('.checkoutProduct');
            cartProductDOM.querySelector('.checkoutProductImg').src = 'http://localhost/AutoJora/' + product.img;
            cartProductDOM.onclick = (e) => {
                e.preventDefault();
                if(e.target.classList.contains('deleteCheckoutItem')) return;
                document.location = 'http://localhost/AutoJora/product/?id=' + product.productId;
            } 
            cartProductDOM.querySelector('.checkoutProductName').textContent = product.name;
            cartProductDOM.querySelector('.deleteCheckoutItem').id = productIndex;
            cartProductDOM.querySelector('.deleteCheckoutItem').addEventListener('click', async (e) => {
                await deleteData({productId: product.id},'http://localhost/AutoJora/userCart/deleteCartItem/')
                await getData('http://localhost/AutoJora/userCart/', updateCart)
                await getData('http://localhost/AutoJora/userCart/', updateCheckout);
                
            })
            document.querySelector('.checkoutItems').appendChild(cartProductDOM)
            })
    }
}
getData('http://localhost/AutoJora/userCart/', updateCheckout)