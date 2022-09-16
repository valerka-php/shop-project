<template>
  <div class="card" v-for="product in this.$root.$data.products">
    <card-body
        :image="product.image"
        :title="product.title"
        :description="product.description"
    ></card-body>
    <card-footer
        :product="product"
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
      const response = await axios.get(`https://gentle-retreat-57670.herokuapp.com/application/product/?type=${typeName[1]}`);
      console.log(response);
      this.$root.$data.products = response.data
      this.cart = this.$root.$data.cartList
      this.updateProductList(this.$root.$data.products,this.cart)
      console.log(this.$root.$data.products)
    },
    updateProductList(productList,cartList){
      for (let key in cartList){
        for (let id in productList){
          if (productList[id].id === cartList[key].id){
            this.$root.$data.products[id].isAdd = true;
            this.$root.$data.products[id].itemsInCart = cartList[key].itemsInCart;
          }
        }
      }
    }
  },
  data() {
    return{
      cart: {},
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