<template>
    <card v-bind:products="products"></card>
</template>

<script>
import axios from "axios";
import Card from "./components/Card";


export default {
  components: {Card},
  data(){
    return {
      products: []
    }
  },

  methods: {
    async fetchProduct(){
      const typeName = window.location.search.split('=');
      const response = await axios.get(`http://nixproject.ua/application/product/?type=${typeName[1]}`);
      this.products = response.data;
      console.log(response)
    },
  },
  mounted(){
    this.fetchProduct();
  }
}
</script>

<style scoped>

</style>