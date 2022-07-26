const cart = {};

function addToCart(obj) {
    if (cart[obj.id] === undefined) {
        cart[obj.id] = obj;
        obj.total = 1;
    } else {
        cart[obj.id].total++
    }

    saveCart();
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function getLocalstorage() {
    return JSON.parse(localStorage.getItem('cart'))
}

function showCart() {
    const storage = getLocalstorage()
    let miniCart = document.getElementById('cart-list')
    let list = '';
    for (let key in storage) {
        list += `
            <li class="cart-product">
                <div>ID: ${storage[key].id}</div>
                <img class="img-list" src="../images/${storage[key].image}.jpg"> ${storage[key].title} 
                <div id="price-id-${storage[key].id}">${storage[key].price}</div>[USD]
                <button class="btn minus bi bi-dash" onclick="decreaseProduct(${storage[key].id})"></button>
                <div class="total" id="total-id-${storage[key].id}" >${storage[key].total}</div>
                <button class="btn plus bi bi-plus" onclick="increaseProduct(${storage[key].id})"></button>
                <button class="btn bi bi-trash3"></button>
            </li>
            `
    }
    miniCart.innerHTML = list;
}

function decalculatePrice(id,count){
    let price = document.getElementById(`price-id-${id}`)
    let totalPrice = document.querySelector('.modal-price');

    if (count > 1){
        totalPrice.innerHTML = parseInt(totalPrice.textContent) - parseInt(price.textContent)
    }

    // console.log(price.textContent);
    // console.log(totalPrice.textContent);
}

function calculatePrice(id) {
    let price = document.getElementById(`price-id-${id}`)
    let totalPrice = document.querySelector('.modal-price');

    totalPrice.innerHTML = parseInt(totalPrice.textContent) + parseInt(price.textContent)

    // console.log(price.textContent);
    // console.log(totalPrice.textContent);
}

function increaseProduct(id) {
    let count = document.getElementById(`total-id-${id}`)
    count.innerHTML++;
    let total = parseInt(count.textContent);
    calculatePrice(id,total)
}

function decreaseProduct(id) {
    let count = document.getElementById(`total-id-${id}`)
    decalculatePrice(id,parseInt(count.textContent));
    if (parseInt(count.textContent) !== 1) {
        count.innerHTML--;
    }

}