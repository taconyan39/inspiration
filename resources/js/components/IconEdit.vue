<template>
<!-- アイコン画像変更用コンポーネント -->
<div>
    <div class="c-img--outer c-img--round p-profileEdit__img--outer">
        <img v-if="url" :src="url" alt="プロフィール画像" class="c-img p-profileEdit__img">
    </div>
    <input type="file" 
    name="icon_img" 
    id="icon_img" 
    autocomplete="icon_img" 
    ref="preview"
    @change="uploadFile"
    >
</div>

</template>

<script>
export default Vue.extend({
    props: [
        'noimage',
        'icon'
        ],
    data() {
        return {
            url: this.icon,
        }
    },
    methods:{
        uploadFile() {
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        }
    },
    mounted(){
        console.log(this.url)
    }
})
</script>