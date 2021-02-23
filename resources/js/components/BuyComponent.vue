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
  // name: 'App',
  // data(){
  //   return {
  //     loading: true,
  //   }
  // },
  methods:{
    onBuy: function(){
      if(confirm('購入を確定しますか？')){
        document.getElementById('buy').submit();
      }
    }
  },
  // mounted(){
  //   setTimeout(() => {
  //     this.loading = false;
  //   }, 1000);
  // },
}
</script>

<style>
.fullview {
  width: 100%;
  height: 100%;
  background: #fefefe;
  position: fixed;
  top: 0;
  left: 0;
}
.loading-spacer {
  height: 30%;
}
</style>
