<template>
  <button
      @click="saveToCart"
      v-if="totalCount > 10"
      class="btn btn-primary add-to-cart"
      :class="{active : this.product.isAdd }"
  > {{ this.product.isAdd ? 'added to cart' : 'purchase' }}
  </button>
  <button
      @click="saveToCart"
      v-else-if="totalCount  > 1 "
      class="btn product-almost-sold-out "
      :class="{active : this.product.isAdd}"
  > {{ this.product.isAdd ? 'added to cart' : 'almost sold out' }}
  </button>
  <button
      v-else
      class="btn product-sold-out" disabled> sold out
  </button>
</template>

<script>
export default {
  data() {
    return {
      id: this.product.id,
      title: this.product.title,
      price: this.product.price,
      image: this.product.image,
      totalCount: this.product.count,
      itemsInCart: 1,
    }
  },
  props: {
    product: {
      type: Object,
    }
  },
  methods: {
    saveToCart() {
      this.product.isAdd = true
      this.$root.$data.cartList.push(this.$data)
      this.$store.commit('calculatePrice', this.price)
      localStorage.setItem('cart', JSON.stringify(this.$root.$data.cartList))
    },
  },
  name: "btn-purchase"
}
</script>

<style scoped>
  .active {
    background-color: forestgreen;
    color: white;
    pointer-events: none;
  }
</style>