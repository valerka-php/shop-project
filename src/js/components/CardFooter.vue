<template>
  <div class="card-footer" >
    <button class="btn btn-primary add-to-cart" id="${content[key].id}"> purchase </button>
    <p class="price"> {{  product.price }} USD </p>
    <p class="count">count: {{  product.count}} </p>
  </div>
</template>

<script>
export default {
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