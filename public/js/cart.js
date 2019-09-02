"use strict";

var addToCartButtons = document.querySelectorAll('.accept-product');

for(var i=0; i < addToCartButtons.length; i++) {
    addToCartButtons[i].addEventListener("click", addToCart);
}

function addToCart() {
    this.disabled = true;

    var productId = this.dataset.id;

    var cart = getCartData() || {};

    if (cart.hasOwnProperty(productId)) {
        cart[productId][3]++;
    } else {
        var productContainer = this.closest('.product');
        var nameProduct = productContainer.querySelector('.name-product').innerHTML;
        var productMoney = productContainer.querySelector('.product-money').innerHTML;
        var productDescription = productContainer.querySelector('.preview-product-description').innerHTML;

        cart[productId] = [nameProduct, productMoney, productDescription, 1];
    }

    setCartData(cart);
    this.disabled = false;
}

function getCartData() {
    return JSON.parse(localStorage.getItem('cart'));
}

function setCartData(cartData) {
    localStorage.setItem('cart', JSON.stringify(cartData));
}