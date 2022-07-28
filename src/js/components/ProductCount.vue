<template>
  <div class="card-footer">
    <p class="count">count: {{count}} </p>
  </div>
</template>

<script>
export default {
  props:{
    count:{
      type: Number,
    }
  },
  name: "product-count"
}
</script>

<style scoped>

</style>