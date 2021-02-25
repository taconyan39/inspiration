<template>
  <div class="c-btn__wrapper p-buy__btn--wrapper">

    <input type="submit"
      value="購入する"
      name="buy"
      class="c-btn--large p-buy__btn
      c-btn--action2
      "
      id="buy"
      @click="onBuy">

  </div>
</template>

<script>
export default {
  methods:{
    onBuy: function(){
      if(confirm('購入を確定しますか？')){
        document.getElementById('buy').submit();
      }
    }
  },
}
</script>

