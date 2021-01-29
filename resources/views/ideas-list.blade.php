@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  <transition name="menu">
      <category-menu v-if="menu" :categories="{{ $categories }}"></category-menu>
  </transition>
  
  @include('components.sidebar-category', ['categories' => $categories])
  
  <main class="l-main__2colum u-site__width">

    <ideas-list :items="items.data"></ideas-list>

    <div class="p-ideasList__bottom">
    </div>
    
  </main>
</div>
@endsection