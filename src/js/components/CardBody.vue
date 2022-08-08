<template>
  <img v-if="image === ''" :src="`/images/default.jpg`" class="card-img-top">
  <img v-else :src="`/images/${image}.jpg`" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{ title }}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. {{ description }}</p>
  </div>
</template>

<script>
export default {
  props:{
   image:{
     type: String,
   } ,
   title:{
     type: String,
   } ,
   description:{
     type: String,
   }
  },
  name: "CardBody"
}
</script>

<style scoped>

</style>