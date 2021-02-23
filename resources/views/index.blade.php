@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

<div class="l-wrapper__2colum u-site__width">

  <div class="p-index__mainImg">
    <div class="c-img--outer"><img class="c-img" src="{{ asset('images/introduction.jpeg') }}" alt="inspirationの紹介画像"></div>
  </div>

    @include('components.sidebar-category',[ 'categories' => $categories ])

    <main class="l-main__2colum">
    
      
      @component('components.pickupCategory-section', [ 'pickupCategories' => $pickupCategories])
        @slot('title')
          人気カテゴリー
        @endslot
      @endcomponent
      
      <section class="c-section p-ideaList">
      @component('components.ideasList-section', ['ideas' => $ideas, 'listType' => 0])
        @slot('title')
          新着のアイデア
        @endslot

      @endcomponent

      @include('components.show-all', ['url' => 'all-ideas-list'])

      </section>

      <section class="p-simpleList c-section">
        @component('components.simpleList-reviewSection', ['reviews' => $reviews])
          @slot('title')
            新着のレビュー
          @endslot

        @endcomponent

        @include('components.show-all', ['url' => 'reviews-list'])

      </section>

    </main>
  </div>
@endsection