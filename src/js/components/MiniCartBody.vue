<template>
  <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
       aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="staticBackdropLabel">Order list</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-order" id="cart-list" v-if="getCartList.length > 0 ">
          <div class="cart-product" v-for="product in getCartList" >
            <div>ID: {{ product.id }}</div>
            <div><img class="img-list" :src="`/images/${product.image}.jpg`" alt=""> {{ product.title }} </div>
            <div id="price-id-${storage[key].id}"> {{ product.price }} </div>[USD]
            <div>
              <button class="btn minus bi bi-dash" ></button>
            </div>
            <div class="total"></div>
            <div>
              <button class="btn plus bi bi-plus" ></button>
            </div>
            <button class="btn bi bi-trash3"></button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">back</button>
            <div class="modal-price"> total price: 1 085 USD</div>
            <button type="button" class="btn btn-primary">pay</button>
          </div>
        </div>
        <div class="modal-order" id="cart-list" v-else> cart is empty </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed:{
    getCartList(){
      return this.$root.$data.cartList;
    }
  },
  name: "MiniCartBody",
}
</script>

<style scoped>

</style>