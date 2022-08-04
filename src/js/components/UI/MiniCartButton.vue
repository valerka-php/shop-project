<template>
  <div class="btn-order">
    <button type="button" class=" cart btn btn-outline-light bi bi-cart3 cart-pos " data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
     <span v-show="getCountProducts >= 1" class="position-absolute top-0 start-100 translate-middle badge badge-pos rounded-pill bg-danger">
      {{ getCountProducts }}
  </span>
    </button>
  </div>
</template>

<script>
export default {
  name: "mini-cart-button",
  computed:{
    getCountProducts(){
      return  this.$root.$data.cartList.length
    }
  }
}
</script>

<style scoped>
.badge-pos{
  margin-left: -96px;
  margin-top: 15px;
}

.cart-pos{
  margin-right: 37px;
}
</style>