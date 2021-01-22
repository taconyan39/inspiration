<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">


      <ul class="list-group">
        <li class="list-group-item" v-for="item in items.data" v-text="item.title"></li>
    </ul>
      <v-pagination :data="items" @move-page="movePage($event)"></v-pagination>

    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script> -->

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="../js/components/v-pagination.vue"></script> -->

</body>
</html>