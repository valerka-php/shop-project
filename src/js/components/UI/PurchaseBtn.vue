<template>
  <button v-if="counts > 10" class="btn btn-primary add-to-cart" > purchase </button>
  <button v-else-if="counts > 1 " class="btn product-almost-sold-out " > almost sold out </button>
  <button v-else class="btn product-sold-out " disabled > purchase </button>
</template>

<script>
export default {
  props:{
    counts: {
      type: Number,
    }
  },
  name: "btn-purchase"
}
</script>

<style scoped>

</style>