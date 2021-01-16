<aside class="l-sidebar">
  <div class="p-categoryList">
    <ul class="c-list p-categoryList__items">
      <li class="c-list__title p-categoryList__item">
        <p class="c-content__title p-categoryList__title">カテゴリ名</p>
      </li>
      @foreach($categories as $category)
      <li class="c-list__item p-categoryList__item">
        <a href="#" class="c-list__link p-categoryList__link">{{ __($category->category_name) }}</a>
      </li>
      @endforeach 
    </ul> 
  </div>
</aside>