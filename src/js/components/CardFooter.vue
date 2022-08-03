<template>
  <div class="card-footer">
    <btn-purchase
        :product="product"
    ></btn-purchase>
    <p v-if="product.count < 1" class="price"> sold out </p>
    <p v-else class="price"> {{ product.price }} USD </p>
  </div>
  <div class="card-footer">
    <p class="count">count: {{ product.count }} </p>
  </div>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
    }
  },
  name: "CardFooter"
}
</script>

<style scoped>

</style>