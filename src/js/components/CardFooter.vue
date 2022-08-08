<template>
  <div class="card-footer">
    <btn-purchase
        :product="product"
    ></btn-purchase>
    <p v-if="product.count < 1" class="price"> <s> {{ product.price }} USD </s> </p>
    <p v-else class="price"> {{ product.price }} USD </p>
  </div>
  <div class="count-footer">
    <p class="count">items left: {{ product.count }} </p>
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