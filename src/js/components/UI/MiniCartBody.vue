<template>
  <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
       aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="staticBackdropLabel">Order list</h5>
          <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">X</button>
        </div>
        <div class="modal-order" id="cart-list" v-if="getCartList.length > 0 ">
          <div v-for="product in getCartList">
              <mini-cart-list class="cart-product"
                              :key="product.id"
                              :id="product.id"
                              :title="product.title"
                              :image="product.image"
                              :price="product.price"
                              :count="product.totalCount"
                              :itemsInCart="product.itemsInCart"
              ></mini-cart-list>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">back</button>
            <div class="modal-price" > total price: {{ $store.state.totalPriceProducts }} USD</div>
            <a class="btn btn-primary" @click="sendApiCart()" href="/payment/">pay</a>
          </div>
        </div>
        <div class="modal-order" v-else> cart is empty </div>
      </div>
    </div>
  </div>
</template>

<script>
import MiniCartList from "./MiniCartList";

export default {
  computed: {
    getCartList() {
      return this.$root.$data.cartList;
    },
  },
  components: {MiniCartList},
  name: "mini-cart-body",
  methods:{
    sendApiCart(){
      let cart = JSON.parse(localStorage.getItem('cart'));
      let price = JSON.parse(localStorage.getItem('totalPrice'));
      let total = {cart,price}

      let request;
      request = new XMLHttpRequest()
      request.open("POST", "http://nixproject.ua/application/cart", true)
      request.setRequestHeader("Content-type", "application/json")
      request.send(JSON.stringify(total))
    }
  }
}
</script>

<style scoped>

</style>