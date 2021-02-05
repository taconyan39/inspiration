@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  <transition name="menu">
      <category-menu v-if="menu" :categories="{{ $categories }}"></category-menu>
  </transition>
  
  @include('components.sidebar-category', ['categories' => $categories])
  
  <main class="l-main__2colum u-site__width">
  <!-- {{$ideas->request()}} -->
  <form method="POST" action="{{ url('ideas-list') }}">
    @csrf
    <search-component :categories="{{ 
      $categories }}"></search-component>
  </form>


    @component('components.pickupList-section', ['ideas' => $ideas])
      @slot('title')
        アイデア一覧
      @endslot
    @endcomponent

    <!-- <div class="p-ideasList__bottom">
      {{ $ideas->links('vendor/pagination/pagination') }} -->
    <!-- </div> -->
    <div class="p-ideasList__bottom">
      {{ $ideas->links('vendor/pagination/pagination') }}

     </div>
    
  </main>
</div>
@endsection
<!-- テスト -->