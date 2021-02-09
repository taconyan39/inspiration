@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">
  <transition name="menu">
      <category-menu v-if="menu" :categories="{{ $categories }}"></category-menu>
  </transition>

  @include('components.sidebar-category', ['categories' => $categories])
  
  <main class="l-main__2colum u-site__width">
  <form method="GET" action="{{ url('ideas-list') }}">
    @csrf

    <div class="c-search__wrapper p-fullList__search">
        <select name="sort_id" class="c-selectBox" >
          <option value="0">検索方法</option>
          @foreach($sorts as $sort)
          
            @if($sort->id == $data['sort_id'])
              <option value="{{$sort->id}}" selected>{{$sort->name}}</option>
            @else
              <option value="{{$sort->id}}" >{{$sort->name}}</option>
            @endif
          @endforeach
        </select>


        <select name="category_id" class="c-selectBox p-fulllList__search--category">

          <option value="0">カテゴリ</option>
        @foreach($categories as $category)
          @if($category->id == $data['category_id'])
            <option value="{{ $category->id}}" selected>{{$category->name_ja}}</option>
          @else
            <option value="{{ $category->id}}">{{$category->name_ja}}</option>
          @endif
        @endforeach
        </select>

        <button name="submit" type="submit" class="c-search"><i class="fas fa-search"></i></button>
      </div>

    <!-- <search-component :categories="{{ 
      $categories }}"></search-component> -->
  </form>


    @component('components.ideaList-section', ['ideas' => $ideas])
      @slot('title')
        アイデア一覧
      @endslot

    @endcomponent


    <div class="p-ideasList__bottom">
      {{ $ideas->appends(['sort_id' => $data['sort_id'], 'category_id' => $data['category_id']])->links('vendor/pagination/pagination') }}

     </div>
    
  </main>
</div>
@endsection