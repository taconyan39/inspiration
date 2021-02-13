<template>
  <div class="l-sp__menu">
      <div class="p-categoryList">
          <ul class="c-list p-categoryList__items">
              <li class="c-list__title p-categoryList__item">
                  <p class="c-content__title p-categoryList__title">カテゴリ名</p>
              </li>
              <li class="c-list__item p-categoryList__item" v-for="item in items" :key="item.id">
                  <a :href="'idea-list?category_id=' + item.id" class="c-list__link p-categoryList__link">{{ item.name_ja }}</a>
              </li>
          </ul>
      </div>
  </div>
</template>

<script>
export default {
//   props: ['categories'],

    data: function(){
        return {
            items: []
        }
    },
    methods:{
        getItems(){
            axios.get('ajax/categories')
                .then((response) => {
                    this.items = response.data;
                })
        }

    },
    mounted(){
        this.getItems();
    }
}
</script>
