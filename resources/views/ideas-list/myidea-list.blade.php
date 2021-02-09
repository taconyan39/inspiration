@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">
  <transition name="menu">
      <category-menu v-if="menu" :categories="{{ $categories }}"></category-menu>
  </transition>

  @include('components.sidebar-profile', ['user' => $user])
  
  <main class="l-main__2colum u-site__width">

    @component('components.ideaList-section', ['ideas' => $ideas])

      @slot('title')
        投稿したアイデア一覧
      @endslot
      
    @endcomponent


    <div class="p-ideasList__bottom">
      {{ $ideas->links('vendor/pagination/pagination') }}

     </div>
    
  </main>
</div>
@endsection
<!-- テスト -->