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
        <div class="total"> {{ totalCount }}</div>
        <div>
          <button
              @click="buttonPlus"
              class="btn plus bi bi-plus"></button>
        </div>
        <button class="btn bi bi-trash3"></button>
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
  },
  data(){
    return{
      totalCount: 1,
    }
  },
  methods:{
    buttonPlus(){
      this.totalCount++
      this.$store.commit('calculatePrice',this.price)
      this.$store.commit('saveToLocalStorage')
    },
    buttonMinus(){
      if (this.totalCount > 1 ){
        this.totalCount--
        this.$store.commit('recalculatePrice',this.price)
        this.$store.commit('saveToLocalStorage')
      }
    },
  },
  name: "mini-cart-list"
}
</script>

<style scoped>

</style>