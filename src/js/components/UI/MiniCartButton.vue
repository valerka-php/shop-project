<template>
  <div class="btn-order">
    <button type="button" class=" cart btn btn-outline-light bi bi-cart3 cart-pos " data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
     <span v-show="getCountProducts >= 1" class="position-absolute top-0 start-100 translate-middle badge badge-pos rounded-pill bg-danger">
      {{ getCountProducts }}
    <span class="visually-hidden">unread messages</span>
  </span>
    </button>
  </div>
</template>

<script>
export default {
  name: "MiniCartButton",
  computed:{
    getCountProducts(){
      return  this.$root.$data.cartList.length
    }
  }

}
</script>

<style scoped>
.badge-pos{
  margin-left: -77px;
  margin-top: 10px;
}

.cart-pos{
  margin-right: 37px;
}
</style>