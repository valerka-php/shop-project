<template>
  <div class="card-footer">
    <btn-purchase v-bind:counts="count"></btn-purchase>
    <p v-if="count < 1" class="price"> sold out </p>
    <p v-else class="price"> {{ price }} USD </p>
  </div>
  <div class="card-footer">
    <p class="count">count: {{ count }} </p>
  </div>
</template>

<script>
export default {
  props: {
    count: {
      type: Number,
    },
    price: {
      type: Number,
    }
  },
  name: "CardFooter"
}
</script>

<style scoped>

</style>