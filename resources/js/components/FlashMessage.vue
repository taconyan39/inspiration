<template>
    <div v-if="flash" class="c-flash">{{ flash }}</div>
</template>

<script>
  export default({
    props: ['flash'],
  })
</script>
