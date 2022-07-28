<template>
  <img v-if="product.image === ''" :src="`/images/default.jpg`" class="card-img-top">
  <img v-else :src="`/images/${product.image}.jpg`" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{ product.title }}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. {{ product.description }}</p>
  </div>
</template>

<script>
export default {
  props:{
   product:{
      type: Array,
    }
  },
  name: "CardBody"
}
</script>

<style scoped>

</style>