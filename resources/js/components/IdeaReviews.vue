<template>
<section class="p-ideaReviews">
  <!-- {{img}} -->

  <ul class="c-list p-ideaReviews__list">

      <p class="p-ideaDetail__reviewTitle">みんなのレビュー</p>
      <!-- {{items.data}} -->

      <div v-if="!items.data" class="p-ideaReviews--none">レビューはまだ投稿されていません</div>

      <li v-else v-for="item in items.data" :key="item.id" class="c-list__item--simple p-ideaReviews__item u-clearfix">

          <!-- 情報部分 -->
          <div class="p-ideaReviews__wrapper">
            <div class="p-ideaReviews__top c-flex--start">
              <div class="p-ideaReviews__top--row">
                <div class="p-ideaReviews__topBox">
                  <div class="c-img--outer c-img--round 
                  p-ideaReviews__userImg--outer">
                    <img class="c-img p-ideaReviews__userImg"
                    :src="img + '/' + item.user.icon_img"
                    alt="アイコンイメージ">
                  </div>
                </div>

                <div class="p-ideaReviews__top--row">
                  <span>{{item.user.name}}</span>
                </div>
              </div>
              <!-- </div> -->

            <div class="p-ideaReviews__top--row">
              <div class="p-ideaReview__topBox">
                <time class="p-ideaReviews__date">{{ item.created_at | moment}}</time>
              </div>

              <div class="p-ideaReviews__topBox">
                <span class="c-rating">{{ item.rating}}</span>
              </div>
            </div>

            </div>          

          </div>

          <div class="p-ideaReviews__review">
            <!-- <input id="readmore" type="checkbox" class="p-ideaReviews__review--checkbox"> -->
            <!-- <label for="readmore" class="p-ideaReviews__review--label"> -->
              
            <!-- </label> -->
            <div class="p-ideaReview__review--wrapper">
              <p class="p-ideaReviews__review--txt">{{item.review}}</p></div>
          </div>
        </li>
    <!-- {{items}} -->
  </ul>

  <pagination :data="items" @move-page="movePage($event)">
  </pagination>

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
    // toggleReview(){
    //   this.toggle = !this.toggle;
    //   console.log('click');
    //   console.log(this.toggle)
    // },
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