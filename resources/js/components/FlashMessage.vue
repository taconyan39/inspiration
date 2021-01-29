<template>
  <!-- <transition name="flash"> -->
    <!-- <div v-if="flash" class="c-flash js-flash">{{ flash }}</div> -->
    <!-- <div v-if="flash" class="c-flash js-flash">{{ flash }}</div> -->
    <div v-if="flash" class="c-flash">{{ flash }}</div>
  <!-- </transition> -->
</template>

<script>
  export default({
    props: ['flash'],
    // フラッシュメッセージのfadeout
    methods: {
      // created(){
        // var flash = document.getElementById('js-flash');
    
        // console.log('test');
        // setTimeout(function(){
            // flash.style.display = "none"
            // this.flash = false
            // }, 3000);
      // }
    }
  })
</script>
