
<form class="p-fullList__form" method="GET" action="{{ route('all-ideas-list') }}">
  @csrf

  <div class="c-search__wrapper p-fullList__search">
      <div class="p-fullList__search--row ">

        <select name="sort_id" class="c-selectBox p-fullList__searchSelect" >
          <option value="0">検索方法</option>
          @foreach($sorts as $sort)
          
            @if($sort->id == $data['sort_id'])
              <option value="{{$sort->id}}" selected>{{$sort->name}}</option>
              @else
              <option value="{{$sort->id}}" >{{$sort->name}}</option>
            @endif
            @endforeach
          </select>
        </div>

      <div class="p-fullList__search--row">

        <select name="category_id" class="c-selectBox p-fullList__searchSelect">
          
          <option value="0">カテゴリ</option>
          @foreach($categories as $category)
            @if($category->id == $data['category_id'])
              <option value="{{ $category->id}}" selected>{{$category->name_ja}}</option>
            @else
              <option value="{{ $category->id}}">{{$category->name_ja}}</option>
            @endif
          @endforeach
        </select>

        <button name="submit" type="submit" class="c-search__btn p-fullList__search--btn"><i class="fas fa-search fa-lg"></i></button>
      </div>
    </div>
</form>