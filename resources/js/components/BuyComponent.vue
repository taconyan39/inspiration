<template>
  <input type="submit" 
    value="購入する" 
    name="buy"  
    class="c-btn--large c-btn--large p-ideaDetail__btn--buy"
    id="buy"
    @click="onBuy">
</template>

<script>
export default {
  methods:{
    onBuy: function(){
      if(confirm('購入を確定しますか？')){
        document.getElementById('buy').submit();
      }
    }
  }
}
</script>
