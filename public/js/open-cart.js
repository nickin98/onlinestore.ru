"use strict";

var productsHTML = getCartProducts();

if (productsHTML) {
    document.querySelector('.row').innerHTML += productsHTML;
} else {
    document.querySelector('.content').innerHTML = '<img class="rounded mx-auto d-block" id="cart" src="/images/cart.png">' +
        '<h2 class="col text-center">Ваша Корзина пуста</h2><br>' + '<div class="row">' +
        '<p class="col text-center">Но это легко поправить! <a href="/">Отправляйтесь за покупками</a>  или авторизуйтесь чтобы увидеть уже добавленные товары.</p>' +
        '</div>';
}

if (openCart()) {
    document.querySelector('.content').innerHTML += '<a href="/order">Оформить заказ</a>';

    var cart = JSON.parse(localStorage.getItem('cart'));
    var products = document.querySelectorAll('.product');
    for(var i = 0; i < products.length; i++) {
        var productId = products[i].querySelector('.accept-product').dataset.id;
        if (cart[productId] != null) {
            products[i].querySelector('#numberPieces').innerHTML = cart[productId][3];
        }
    }
}

var deleteFromCartButtons = document.querySelectorAll('.accept-product');

for(var i=0; i < deleteFromCartButtons.length; i++) {
    deleteFromCartButtons[i].addEventListener("click", deleteFromCart);
}

function getCartProducts() {
    var cart = openCart();

    if (cart == false) {
        return false
    }
    var productsHTML = '';

    for(var id in cart) {
        var productName = cart[id][0];
        var productMoney = parseInt(cart[id][1]);
        var productDescription = cart[id][2];
        var productCount = cart[id][3];
        var productImagePath = cart[id][4];
        var totalPrice = productMoney * productCount;
        productsHTML += '<div class="product col-lg-3">';
        productsHTML +=     '<div class="preview-product-image">';
        productsHTML +=         '<a href="#"><img class="img-fluid " src="' + productImagePath + '"></a>';
        productsHTML +=     '</div>';
        productsHTML +=     '<a class="name-product" href="#">' + productName + '</a>';
        productsHTML +=     '<div class="product-controls">';
        productsHTML +=         '<div class="row">';
        productsHTML +=             '<div class="product-price">';
        productsHTML +=                 '<span class="product-money">' + totalPrice + ' ₽/</span><span id="numberPieces">0</span> шт';
        productsHTML +=         '</div>';
        productsHTML +=         '<div class="product-to-cart ml-auto">';
        productsHTML +=             '<a class="accept-product" data-id="' + id + '">Убрать</a>';
        productsHTML +=         '</div>';
        productsHTML +=     '</div>';
        productsHTML += '</div>';
        productsHTML += '</div>';
    }

    return productsHTML;
}

function openCart() {
    var cart = localStorage.getItem('cart');

    if (cart) {
        return JSON.parse(cart);
    }

    return false;
}

function deleteFromCart() {
    var productId = this.dataset.id;
    var productContainer = this.closest('.product');
    var numberPieces = productContainer.querySelector('#numberPieces');

    var cart = openCart();

    var price = document.querySelector('#basket-price');
    // localStorage.setItem('price', localStorage.getItem('price') - parseInt(cart[productId][1]) * cart[productId][3]);
    localStorage.setItem('price', localStorage.getItem('price') - parseInt(cart[productId][1]));
    price.innerHTML = localStorage.price;

    if (numberPieces.innerHTML == 1) {
        productContainer.remove();
        delete cart[productId];
    } else {
        numberPieces.innerHTML = numberPieces.innerHTML - 1;
        cart[productId][3]--;
        var money = productContainer.querySelector('.product-money');
        money.innerHTML = parseInt(money.innerHTML) - parseInt(cart[productId][1]) + '₽/';
    }


    if (isEmptyObject(cart)) {
        var container = document.querySelector('.content');
        localStorage.removeItem('cart');
        container.innerHTML = '<img class="rounded mx-auto d-block" id="cart" src="/images/cart.png">' +
            '<h2 class="col text-center">Ваша Корзина пуста</h2><br>' + '<div class="row">' +
            '<p class="col text-center">Но это легко поправить! <a href="/">Отправляйтесь за покупками</a>  или авторизуйтесь чтобы увидеть уже добавленные товары.</p>' +
            '</div>';
    } else {
        setCartData(cart);
    }
}

function isEmptyObject(object) {
    return JSON.stringify(object) == "{}";
}
