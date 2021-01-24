<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div id="app" class="container">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label>商品名</label>
                <input class="form-control" type="text" v-model="name">
                <div class="text-danger" v-if="errors.name" v-text="errors.name"></div>
            </div>
            <div class="form-group">
                <label>価格</label>
                <input class="form-control" type="text" v-model="price">
                <div class="text-danger" v-if="errors.price" v-text="errors.price"></div>
            </div>
            <!-- <div class="form-group">
                <label>画像</label>
                <input class="form-control" type="file" accept="image/*" @change="onFileChange">
                <div class="text-danger" v-if="errors.image" v-text="errors.image"></div>
            </div> -->
            <button class="btn btn-primary" type="button" @click="onSubmit">画像をアップロードする</button>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
<script>

    new Vue({
        el: '#app',
        data: {
            name: '',
            price: 0,
            imageFile: null,
            errors: {
                name: '',
                price: '',
                // image: ''
            }
        },
        methods: {
            // onFileChange(e) {

            //     // 選択された画像を変数で保持する
            //     this.imageFile = e.target.files[0];

            // },
            onSubmit() {

                // 画像をアップロード
                const url = '/product';
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('price', this.price);
                // formData.append('image', this.imageFile);

                axios.post(url, formData)
                    .then(response => {

                        if(response.data.result) {

                            alert('商品登録が完了しました。');

                        }

                    })
                    .catch(error => {

                        this.errors = {};
                        const errors = error.response.data.errors;

                        for(let key in errors) {

                            this.errors[key] = errors[key][0];

                        }

                    });

            }
        }
    });

</script>
</body>
</html>
