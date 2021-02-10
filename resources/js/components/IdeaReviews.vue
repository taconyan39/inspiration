<template>
<section class="p-simpleList">

  <ul class="c-list p-simpleList__list">

      <p class="p-ideaDetail__reviewTitle">みんなのレビュー</p>

      <div v-if="!items.data[0]" class="p-simpleList--none">レビューはまだ投稿されていません</div>

      <li v-else v-for="item in items.data" :key="item.id" class="c-list__itemz p-simpleList__item u-clearfix">

          <!-- 情報部分 -->
          <div class="p-simpleList__user">
              <div class="c-img--outer p-simpleList__userImg--outer">
              <img class="c-img p-simpleList__userImg" src="'/images/icon/'+ item.data.user.icon_img" alt="アイコンイメージ">
              </div>
          </div>

          <!-- タイトル部分 -->
          <div class="p-simpleList__info">
              <div class="p-simpleList__info--top">
              <div class="p-simpleList__info--spec">
                  <span class="p-simpleList__name">{{item.user.name}}</span>
                  <span class="c-rating">{{ item.rating }}</span>
                  <span class="p-simpleList__rating--num"></span>
                  <span class="c-tag p-simpleList__tag">{{item.idea.category_id}}</span>
              </div>
              </div>

              <!-- 概要部分 -->
              <div class="p-simpleList__info--bottom">
              <p class="c-txt p-simpleList__summary ">
                  {{item.review}}</p>
              </div>
          </div>
      </li>

  </ul>

  </section>
            
</template>

<script>
export default {
  props: ['id'],
  data: function(){
    return {
      items: [],
      category: []
    }
  },
  methods:{
    getItems(){
      const url = '/ajax/reviews/' + this.id
      axios.get(url)
        .then((response) => {
          this.items = response.data;
        });
    },
      
    getCategory(){
    const url = '/ajax/categories'
    axios.get(url)
      .then((response) => {
        this.category = response.data;
      });
    },
  },
  mounted(){
    this.getItems();
    // this.getCategory();

    // console.log(this.categories);
    // console.log(this.items);
  }
}
</script>