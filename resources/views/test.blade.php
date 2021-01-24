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
      <button v-on:click="show=!show">切り替え</button>
    <transition name="demo">
      <div v-show="show">トランジションさせたい要素</div>
    </transition>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

  <script>
    new Vue({
      el: '#app',
      data: {
        show: true
      }
    })
    </script>


</body>
</html>