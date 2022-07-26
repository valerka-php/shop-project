const cart = {};

function addToCart(obj) {
    if (cart[obj.id] === undefined) {
        cart[obj.id] = obj;
        obj.total = 1;
    } else {
        cart[obj.id].total++
    }

    calculatePrice(cart[obj.id].id)
    saveCart();
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function getLocalstorage(name) {
    return JSON.parse(localStorage.getItem(`${name}`))
}

function showCart() {
    const storage = getLocalstorage('cart')
    let cartList = document.getElementById('cart-list')
    let list = '';
    for (let key in storage) {
        list += `
            <li class="cart-product">
                <div>ID: ${storage[key].id}</div>
                <div><img class="img-list" src="../images/${storage[key].image}.jpg" alt=""> ${storage[key].title} </div>
                <div id="price-id-${storage[key].id}">${storage[key].price}</div>[USD]
                    <div>
                        <button class="btn minus bi bi-dash" onclick="decreaseProduct(${storage[key].id})"></button>
                    </div>
                    <div class="total" id="total-id-${storage[key].id}" >${storage[key].total}</div>
                    <div>
                        <button class="btn plus bi bi-plus" onclick="increaseProduct(${storage[key].id})"></button>
                    </div>
                <button class="btn bi bi-trash3"></button>
            </li>
            `
    }
    cartList.innerHTML = list;
}

function recalculatePrice(id,count){
    let price = cart[id].price;
    let totalPrice = document.querySelector('.modal-price');
    if (count > 1){
        totalPrice.innerHTML = parseInt(totalPrice.textContent) - price;
    }
}

function calculatePrice(id) {
    let price = cart[id].price;
    let totalPrice = document.querySelector('.modal-price');

    totalPrice.innerHTML = parseInt(totalPrice.textContent) + price

}

function increaseProduct(id) {
    let count = document.getElementById(`total-id-${id}`)
    count.innerHTML++;
    calculatePrice(id)
}

function decreaseProduct(id) {
    let count = document.getElementById(`total-id-${id}`)
    recalculatePrice(id,parseInt(count.textContent));
    if (parseInt(count.textContent) > 1) {
        count.innerHTML--;
    }

}