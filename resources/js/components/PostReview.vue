<template>
  <div class="p-ideaDetail__reviewForm ">
    <div class="c-row">
        <select name="" id="" class="p-ideaDetail__reviewForm--select c-selectBox">
            <!-- <span class="c-rating"></span> -->
            <option value="0">評価</option>

                <option v-for="item in items" :value="item.count" :key="item.id" v-text="item.star">
                </option>
        </select>
    </div>
    <label class="c-form__label">
        <textarea class="c-form__textarea p-ideaDetail__reviewForm--textare" name="idea-review" id=""></textarea>
    </label>

    <div class="c-form__row p-ideaDetail__reviewFormRow--btn">
        <button type="submit" class="c-btn p-ideaDetail__reviewForm--btn">レビューを投稿する</button>
    </div>

  </div>
</template>

<script>
export default {
  data: function(){
    return {
      items: [
        {
          id: 1,
          star: '★★★★★',
          count: 5,
          },
        {
          id: 2,
          star: '★★★★',
          count: 4
          },
          {
            id: 3,
            star: '★★★',
            count: 3,
          },
        {
          id: 4,
          star: '★★',
          count: 2,
          },
        {
          id: 5,
          star: '★',
          count: 1,
        },

      ]
    }
  },
  getItems(){

  },
  mounted(){
    console.log(this.items);
  }
}
</script>