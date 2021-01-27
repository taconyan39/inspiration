<template>
  <form>
      
      <button class="c-btn c-rating  p-ideaDetail__btn--interest" v-if="">解除する</button>

      <button class="c-btn c-rating--empty  p-ideaDetail__btn--interest" v-else> 気になる</button>

  </form>
</template>

<script>
export default {
  props: {
    data: {},
  }
}
</script>

 