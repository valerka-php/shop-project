<template>
  <div class="card" v-for="product in products">
      <card-body v-bind:product="product"> </card-body>
      <card-footer v-bind:product="product"> </card-footer>
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