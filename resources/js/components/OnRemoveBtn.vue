<template>
  <button class="c-btn       c-form__btn p-ideaPost__btn--remove" type="submit"
                          @click="onRemove()">
                              削除する
                  </button>
</template>

<script>
export default {

  methods: {

    onRemove(){
      //   削除の確認
        if(!confirm('削除します。よろしいですか？')) {
          return;
        }

    }
  }
}
</script>