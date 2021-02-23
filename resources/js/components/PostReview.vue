<template>

    <label for="review" class="c-form__label">
      <textarea class="c-form__textarea p-postReview__form--textare"             name="review"
                id="review"
                maxlength="500"
                v-model.trim="review"
                placeholder="500文字以内で入力してください"
                ></textarea>
          <div class="c-form__countLength c-flex--end p-ideaPost__count">
              <span>{{ review.length}}/500</span>
          </div>
    </label>

</template>

<script>
export default {
  data: function(){
    return {
      review: "",
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