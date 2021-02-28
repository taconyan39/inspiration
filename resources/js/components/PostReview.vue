<template>
<!-- レビュー投稿用のコンポーネント -->
    <label for="review" class="c-form__label">
      <textarea class="c-form__textarea p-postReview__form--textare"             name="review"
                id="review"
                maxlength="200"
                v-model.trim="review"
                placeholder="200文字以内で入力してください"
                ></textarea>
          <div class="c-form__countLength c-flex--end p-ideaPost__count">
              <span>{{ review.length}}/200</span>
          </div>
    </label>

</template>

<script>
export default {
  props: ['oldreview'],
  data: function(){
    return {
      review: (this.oldreview) ? this.oldreview : '' ,

    }
  },
  methods: {
    onSubmit(){
      // 投稿の確認
      if(!confirm('投稿します。よろしいですか？')){
        return ;
      }
    }
  }
}
</script>