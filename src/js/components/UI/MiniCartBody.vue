<template>
  <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
       aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="staticBackdropLabel">Order list</h5>
        </div>
        <div class="modal-order" id="cart-list" v-if="getCartList.length > 0 ">
          <div v-for="product in getCartList">
            <mini-cart-list class="cart-product"
                            :id="product.id"
                            :title="product.title"
                            :image="product.image"
                            :price="product.price"
            ></mini-cart-list>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">back</button>
            <div class="modal-price" > total price: {{ $store.state.totalPriceProducts }} USD</div>
            <button type="button" class="btn btn-primary">pay</button>
          </div>
        </div>
        <div class="modal-order" v-else> cart is empty</div>
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
}
</script>

<style scoped>

</style>