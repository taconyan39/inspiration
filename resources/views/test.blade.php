<html>
<header>
<style>
    .demo-enter-active, .demo-leave-active{
      transition: transform 1s;
    }
    .demo-enter, .demo-leave-to{
      transform: translateX( -100%);
    }
  </style>
</header>
  
  <body>
    <div id="app">
      <button v-if="true" @click="">☆ お気に入り</button>
      <button v-else>★ 解除する</button>

      <interest-component :id="@json($idea->id)"> </interest-component>
    </div>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script> -->

<script src="{{ asset('js/app.js') }}"></script>

  <script>
    // new Vue({
    //   el: '#app',
      // props: {
        
      // },
      // getItems(){
      //   // Ajaxでデータの取得
        
      //   console.log(this.$emit);
      //   const url = '/ajax/post-idea/' + this.page;
      //   axios.get(url)
      //       .then((response) => {
      //   methods: {

      //         this.items = response.data;

      //       });
      //   },

      // },
      // mounted(){
      //   this.getItems();
      // }
    // })
    </script>


</body>
</html>