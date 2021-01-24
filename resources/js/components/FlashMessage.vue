<template>
  <!-- <transition name="flash"> -->
    <!-- <div v-if="flash" class="c-flash js-flash">{{ flash }}</div> -->
    <div v-if="flash" class="c-flash js-flash">{{ flash }}</div>
  <!-- </transition> -->
</template>

<script>
  export default({
    props: ['flash'],
    // フラッシュメッセージのfadeout
    methods: {
      mounted(){
        var flash = document.getElementById('js-flash');
    
        setTimeout(function(){
            flash.style.display = "none"
            }, 3000);
      }
    }
  })
</script>
