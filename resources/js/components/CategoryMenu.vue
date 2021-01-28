<template>
  <div class="l-sp__menu">
      <div class="p-categoryList">
          <ul class="c-list p-categoryList__items">
              <li class="c-list__title p-categoryList__item">
                  <p class="c-content__title p-categoryList__title">カテゴリ名</p>
              </li>
              <li class="c-list__item p-categoryList__item" v-for="category in categories" :key="category.id">
                  <a :href="'idea-list/' + category.id" class="c-list__link p-categoryList__link">{{ category.category_name }}</a>
              </li>
          </ul>
      </div>
  </div>
</template>

<script>
export default {
  props: ['categories'],
}
</script>
