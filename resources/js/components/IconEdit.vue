<template>
  <div class="c-container--half">

    <label for="icon_img">
        プロフィールを変更する
        <!-- <div v-if="url" class="c-img--outer p-profileEdit__img--outer"> -->
        <div class="c-img--outer p-profileEdit__img--outer">
        
          <img v-if="url" :src="url" alt="プロフィール画像" class="c-img p-profileEdit__img">

          <!-- 未登録の場合は仮の画像を表示 -->

          <img v-else :src="noimage" alt="画像なし" class="c-img p-profileEdit__img">
      </div>
        <input type="file" 
                name="icon_img" 
                id="icon_img" 
                autocomplete="icon_img" 
                value=""
                ref="preview"
                @change="uploadFile"
                >
    </label>

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