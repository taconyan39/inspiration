<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div style="padding:15px;" id="app">
        <div v-if="show" class="c-flash js-flash"></div>
        <button @click="removeFlash">フラッシュ</button>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script> -->
    <!-- <script src="/js/vue/v-pagination.js"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const app = new Vue({
    el: '#app',

    data: function() {
      return {
        menu: false,
        page: 1,
        items: [],
        flash: false,
        show: true
      }
    },
    methods: {
    //   getItems() {
  
    //     const url = '/ajax/ideas-list?page=' + this.page;
    //     // const url = '/ajax/ideas-list';
    //     axios.get(url)
    //       .then((response) => {
    //         this.items = response.data;
    //       });
    //     }
    
    // }

    removeFlash() {
        // var that = this.flash
        this.show = true
        }
    },
// },
mounted() {

    // this.getItems();{
        // var flash = document.getElementById('flash');
        // this.flash = removeFlash();

        // if(this.flash === true){
        //     this.show = true
        // that = this.show;
        //     setTimeout(function(){
        //         console.log('タイマー')
        //         // flash.style.display = "none"
        //         console.log(that);
        //         that = false
        //     }, 3000);
        // },
    // updated(){
    //     setTimeout(() => {
    //         this.show = false
    //     }, 3000)
    // },
}
});

// (function() {
//     'use strict';

//     // フラッシュメッセージのfadeout
//     $(function(){
//         $('.flash_message').fadeOut(3000);
//     });

// })();
    </script>
</body>
</html>