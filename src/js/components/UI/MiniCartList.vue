<template>
      <div>
        <div>ID: {{ id }}</div>
        <div><img class="img-list" :src="`/images/${image}.jpg`" alt=""> {{ title }}</div>
        <div> {{ price }}</div>
        [USD]
        <div>
          <button
              @click="buttonMinus"
              class="btn minus bi bi-dash"></button>
        </div>
        <div class="total"> {{ totalInCart }}</div>
        <div>
          <button
              @click="buttonPlus"
              class="btn plus bi bi-plus"></button>
        </div>
        <button
            @click="remove"
            class="btn bi bi-trash3"
        ></button>
      </div>
</template>

<script>
export default {
  props:{
    id:{
      type: Number,
    },
    title:{
      type: String
    },
    image:{
      type: String
    },
    price:{
      type: Number
    },
    count:{
      type: Number
    },
    itemsInCart:{
      type: Number,
    }
  },
  data(){
    return{
      totalInCart: this.itemsInCart,
    }
  },
  methods:{
    buttonPlus(){
      if (this.totalInCart < this.count){
        this.totalInCart++
        this.$store.commit('calculatePrice',this.price)
        this.saveItems()
      }
    },
    buttonMinus(){
      if (this.totalInCart > 1 ){
        this.totalInCart--
        this.$store.commit('recalculatePrice',this.price)
        this.saveItems()
      }
    },
    saveItems(){
      for (let key in this.$root.$data.cartList){
        if (this.$root.$data.cartList[key].id === this.id){
          this.$root.$data.cartList[key].itemsInCart = this.totalInCart
          localStorage.setItem('cart', JSON.stringify(this.$root.$data.cartList))
        }
      }
    },
    remove(){
      for (let key in this.$root.$data.cartList){
        // console.log(this.$root.$data.cartList[key].id)
        // console.log(this.id)
          if (this.$root.$data.cartList[key].id === this.id){

          }
      }
      // localStorage.setItem('cart', JSON.stringify(this.$root.$data.cartList))
    }
  },
  name: "mini-cart-list"
}
</script>

<style scoped>

</style>