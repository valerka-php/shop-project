<template>
  <div class="card" v-for="product in products">
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
      const response = await axios.get(`http://nixproject.ua/application/product/?type=${typeName[1]}`);
      this.products = response.data
      this.cart = this.$root.$data.cartList
      this.updateCart(this.products,this.cart)
    },
    updateCart(productList,cartList){
      for (let key in cartList){
        for (let id in productList){
          if (productList[id].id === cartList[key].id){
            this.products[id].isAdd = true;
            this.products[id].itemsInCart = cartList[key].itemsInCart;
          }
        }
      }
    }
  },
  data() {
    return{
      products: {},
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