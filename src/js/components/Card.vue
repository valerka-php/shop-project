<template>
  <div class="card" v-for="product in products">
    <img v-if="product.image === ''" :src="`/images/default.jpg`" class="card-img-top">
    <img v-else :src="`/images/${product.image}.jpg`" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">{{ product.title }}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. {{ product.description }}</p>
    </div>
    <div class="card-footer" >
      <btn-purchase> </btn-purchase>
      <p class="price"> {{  product.price }} USD </p>
      <p class="count">count: {{  product.count}} </p>
    </div>
<!--    <card-body v-bind:product="products"> </card-body>-->
<!--    <card-footer v-bind:product="products"></card-footer>-->
  </div>
</template>

<script>
import CardBody from "./CardBody";
import CardFooter from "./CardFooter";

export default {
  components: {CardFooter, CardBody},
  props:{
    products:{
      type: Array
    }
  },
  data(){
    return {

    }
  },
  name: "Card"
}
</script>

<style scoped>

</style>