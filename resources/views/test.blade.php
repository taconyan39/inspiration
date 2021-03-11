@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

<div class="l-wrapper__2colum u-site__width">

  <div class="p-index__mainImg">
    <div class="c-img--outer"><img class="c-img" src="{{ asset('images/default/introduction.jpeg') }}"
    srcset="{{ asset('images/retina_2x/introduction.jpeg 2x') }}"
    alt="inspirationの紹介画像"></div>
  </div>

    @include('components.sidebar-category',[ 'categories' => $categories ])

    <main class="l-main__2colum">
    
      <section class="c-section p-ideaList">
      @component('components.ideasList-section', ['ideas' => $ideas, 'listType' => 0])
        @slot('title')
          新着のアイデア
        @endslot

      @endcomponent

      @include('components.show-all', ['url' => 'all-ideas-list'])
      </section>
      

    </main>
  </div>
@endsection