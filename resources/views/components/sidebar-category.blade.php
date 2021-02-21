<aside class="l-sidebar">
  <div class="p-categoryList">
    <ul class="c-list p-categoryList__items">
      <li class="c-list__title p-categoryList__item">
        <p class="p-categoryList__title">カテゴリ名</p>
      </li>

      <li class="c-list__item--simple p-categoryList__item">
        <a href="{{ url('all-ideas-list?category_id=0') }}" class="c-list__link p-categoryList__link">すべて</a>
      </li>
      
      @foreach($categories as $category)
      <li class="c-list__item--simple p-categoryList__item">
        <a href="{{ url('all-ideas-list?category_id=' . $category->id) }}" class="c-list__link p-categoryList__link">{{ __($category->name_ja) }}</a>
      </li>
      @endforeach 
    </ul> 
  </div>
</aside>