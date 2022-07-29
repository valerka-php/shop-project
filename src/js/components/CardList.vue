<template>
  <div class="card" v-for="product in products">
    <card-body
        :image="product.image"
        :title="product.title"
        :description="product.description"
    ></card-body>
    <card-footer
        :price="product.price"
        :count="product.count"
    ></card-footer>
  </div>
</template>

<script>
import CardBody from "./CardBody";
import CardFooter from "./CardFooter";
import axios from "axios";

export default {
  components: {CardFooter, CardBody},
  methods: {
    async fetchProduct() {
      const typeName = window.location.search.split('=');
      const response = await axios.get(`http://nixproject.ua/application/product/?type=${typeName[1]}`);
      this.products = response.data;
    },
  },
  data() {
    return {
      products: []
    }
  },
  mounted() {
    this.fetchProduct();
  },
  name: "CardList"
}
</script>

<style scoped>

</style>