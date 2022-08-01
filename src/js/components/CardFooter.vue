<template>
  <div class="card-footer">
    <btn-purchase
        :product="product"
        :counts="count"></btn-purchase>
    <p v-if="count < 1" class="price"> sold out </p>
    <p v-else class="price"> {{ price }} USD </p>
  </div>
  <div class="card-footer">
    <p class="count">count: {{ count }} </p>
  </div>
</template>

<script>
export default {
  data(){
    return{
      product : this.addProduct
    }
  },
  props: {
    count: {
      type: Number,
    },
    price: {
      type: Number,
    },
    addProduct: {
      type: Object,
    }
  },
  name: "CardFooter"
}
</script>

<style scoped>

</style>