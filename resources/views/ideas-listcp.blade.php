@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  
  @include('components.sidebar-category', ['categories' => $categories])
  
  <main class="l-main__2colum u-site__width">

    @component('components.allList-section', ['items' => $ideas])
        @slot('title')
            アイデア一覧
        @endslot

    @endcomponent

    <div>
      <!-- <ideas-list :ideas="{{ $ideas }}"></ideas-list> -->
    </div>

    <div class="p-ideasList__bottom">
      {{ $ideas->links('vendor/pagination/pagination') }}
    </div>
    
  </main>
</div>
@endsection