<template>
<!-- アイデアに寄せられた口コミを表示するコンポーネント -->
<section class="p-ideaReviews">

  <p class="p-ideaDetail__reviewTitle">みんなの口コミ</p>

  <!-- 口コミがない場合 -->
  <div v-if="!items.data[0]" class="c-list p-ideaReviews__list">

      <div class="p-ideaReviews--none">口コミはまだ投稿されていません</div>
  </div>

  <!-- 口コミがある場合 -->

  <div v-else>
    <ul  class="c-list p-ideaReviews__list">

        <li v-for="item in items.data" :key="item.id" class="c-list__item--simple p-ideaReviews__item u-clearfix">

            <!-- 情報部分 -->
            <div class="p-ideaReviews__wrapper">
              <div class="p-ideaReviews__top">
                <div class="p-ideaReviews__top--row c-flex--start">
                    <div class="c-img--outer c-img--round 
                    p-ideaReviews__userImg--outer">
                      <img class="c-img p-ideaReviews__userImg"
                      :src="item.user.icon_img"
                      alt="アイコンイメージ">
                    </div>
                    <div class="p-ideaReviews__top--name">
                      <span>{{item.user.name}}</span>
                    </div>

                </div>

              <div class="p-ideaReviews__top--row c-flex--between">
                <div class="p-ideaReview__topBox ">
                  <time class="p-ideaReviews__date">{{ item.created_at | moment}}</time>
                </div>

                <div class="p-ideaReviews__topBox">
                  <span class="c-star" v-for="n in item.rating" :key="n"></span>
                </div>
              </div>

              </div>          

            </div>

            <div class="p-ideaReviews__review">
              <div class="p-ideaReview__review--wrapper">
                <p class="p-ideaReviews__review--txt">{{item.review}}</p></div>
            </div>
          </li>
    </ul>

    <pagination :data="items" @move-page="movePage($event)">
    </pagination>
  </div>

  </section>
            
</template>

<script>
import moment from 'moment';
import Pagination from './Pagination.vue';

export default {
  components: { Pagination },
  props: ['id', 'img'],
  data: function(){
    return {
      items: [],
      page: 1
    }
  },
  methods:{
    getItems(){
      const url = '/ajax/reviews/' + this.id +'?page=' + this.page;
      axios.get(url)
        .then((response) => {
          this.items = response.data;
        });
    },
    movePage(page) {
      this.page = page //ページ番号を更新
      this.getItems();
    }
  },
  mounted(){
    this.getItems();
  },
  filters: {
    moment: function(date){
      return moment(date).format('YYYY/MM/DD');
    }
  }
}
</script>