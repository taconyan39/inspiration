<template>
  <section class="p-fullList">

    <h2 class="c-title__section p-fullList__title">アイデア一覧</h2>

    <div class="c-search__wrapper p-fullList__search">
      <select name="sort" class="c-selectBox" v-model="selectedSortId" @change="onChangeSort">
        <option :value="selectedSortId">絞り込む</option>
        <option v-for="sort in sorts" :value="sort.id" v-text="sort.type" :key="sort.id"></option>
      </select>

      <select name="order" class="c-selectBox p-fullList__search--order" v-model="selectedOrderId">
        <option :value="selectedOrderId">並び順</option>
        <option :value="order.id" v-for="order in filteredOrders" :key="order.id" v-text="order.text"></option>
      </select>

      <select name="sort_category" v-model="selectedCategoryId" class="c-selectBox p-fulllList__search--category">
        <option :value="selectedCategoryId">カテゴリー</option>
        <option :value="category.id" v-for="category in categories" :key="category.id">{{category.category_name}}</option>

      </select>

      <button class="c-search" type="submit" name="submit">検索</button>
    </div>

    <ul class="c-list p-fullList__list">
      <li v-for="item in items.data" :key="item.id" class="p-fullList__item u-clearfix">
      <div href="#" class="c-list__link p-fullList__listLink u-clearfix">
          <div class="p-fullList__info c-info">
            <!-- <div class="p-fullList__tag"> -->
              
            <div class="c-info__box p-fullList__infoBox--left">
              <time class="p-fullList__info--date">{{ item.created_at | moment }}</time>
            </div>
            <div class="c-info__box c-dammy p-fullList__infoBox"></div>
            <div class="c-info__box p-fullList__infoBox">
              <span class="p-fullList__rating c-rating">{{ item.rating }}({{ item.countReview }})</span>
            </div>
            <div class="c-info__box p-fullList__infoBox">
              <span class="c-price p-fullList__price">¥{{ item.price }}</span>
            </div>
          </div>
          <div class="p-fullList__infoBox--bottom">
            <!-- <span class="c-tag p-fullList__infoBox--tag">{{ item.category.category_name }}</span> -->
            <h3 class="c-list__item--title p-fullList__infoBox--title">{{ item.title }}</h3>
          </div>

          <!-- body -->
          <div class="p-fullList__body">

            <div class="p-fullList__user">
              <div class="p-fullList__userCard c-card">
                <div class="c-img--outer c-card--top p-fullList__userImg--outer">

                  <!-- <img class="c-img p-fullList__userImg" src="{{asset('storage/images/icons/' . $idea->user->icon_img )}}" alt=""> -->
                  <img class="c-img p-fullList__userImg" src="../../../public/images/icons/icon_sample01.jpg" alt="">
                </div>
                <div class="c-card--bottom p-fullList__userCard--bottom">
                  <p class="c-card__name">{{ item.user.name }}</p>
                </div>
              </div>
            </div>
            <div class="c-info__item">
              
              <div class="p-fullList__summary">
                <div class="p-fullList__text--container">
                  <p class="c-txt p-fullList__text ">{{ item.summary }}</p>
                </div>
              </div>
              
              <div class="p-fullList__bottom">
                <a href="" class="c-btn p-fullList__btn-detail">詳細を見る</a>
                <a v-if="!item.buy_flg" href="" class="c-btn p-fullList__btnEdit">編集する</a>
                <a v-else href="" class="c-btn--enable c-btn p-fullList__btnEdit--enable">編集不可</a>
              </div>
            </div>
          </div>
            
      </div>
      </li>
    </ul>

    <pagination :data="items" @move-page="movePage($event)"></pagination>

</section>
</template>

<script>
import moment from 'moment';

export default {
  props:['sort', 'categories'],
  data: function() {
    return {
      page: 1,
      items: [],
      sorts: [
        { id:1, type: '投稿日'},
        { id:2, type: '価格順'},
      ],
      orders: [
        { sortId: 1, id: 1, text: '投稿が新しい順'},
        { sortId: 1, id: 2, text: '投稿が古い順'},

        { sortId: 2, id: 1, text: '価格が高い順'},
        { sortId: 2, id: 2, text: '投稿が安い順'},

      ],
      selectedSortId: -1,
      selectedOrderId: -1,
      selectedCategoryId: -1,
    }
  },
  methods: {
    getItems() {

            const url = '/ajax/ideas-list';

            axios.get(url)
              .then((response) => {
                this.items = response.data;
              });
            },
        onChangeSort() {

          this.selectedOrderId = -1;

          if(!this.selectedSortId) {
            this.selectedSortId = -1;
          }
        },
      movePage(page) {
        this.page = page; // ページ番号を更新
        this.getItems();

    }
  },
  computed: {

    filteredOrders() {
      let filteredOrders = [];
      
      for(let i = 0; i < this.orders.length ; i++){
        let order = this.orders[i];
        if(order.sortId == this.selectedSortId) {
          filteredOrders.push(order);
        }
      }
      return filteredOrders;
    }
  },
  mounted(){

    if(this.page_type === 1){
      this.pageType = 1;
    }

    this.getItems();
  },
  filters: {
    moment: function(date) {
      return moment(date).format('YYYY/MM/DD');
    }
  }
}

</script>