@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  
  @include('components.sidebar-profile', ['user' => $user])
  
  <main class="l-main__2colum u-site__width">

    @component('components.simpleList-section', ['items' => $postIdeas])
        @slot('title')
            投稿したアイデア
        @endslot

    @endcomponent
    
    @component('components.simpleList-section', ['items' => $buyIdeas])
        @slot('title')
          購入アイデア
        @endslot
    @endcomponent

    @component('components.simpleList-section', ['items' => $interestIdeas])
        @slot('title')
            気になるリスト
        @endslot
    @endcomponent

    @component('components.simpleList-reviewSection', ['reviews' => $ideaReviews])
        @slot('title')
            レビュー一覧
        @endslot
    @endcomponent



    
  </main>
</div>
@endsection