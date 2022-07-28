<template>
  <div class="card-footer" >
    <btn-purchase v-bind:counts="product.count"> </btn-purchase>
    <p v-if="product.count < 1" class="price"> sold out </p>
    <p v-else class="price"> {{  product.price }} USD </p>
  </div>
  <product-count v-bind:count="product.count"> </product-count>
</template>

<script>
import ProductCount from "./ProductCount";
export default {
  components: {ProductCount},
  props:{
    product:{
      type: Array,
    }
  },
  name: "CardFooter"
}
</script>

<style scoped>

</style>