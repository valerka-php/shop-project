<template>
    <card v-bind:products="products"></card>
</template>

<script>
import axios from "axios";
export default {
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
    },
  },
  mounted(){
    this.fetchProduct();
  }
}
</script>

<style scoped>

</style>