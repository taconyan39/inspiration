@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  
  @include('components.sidebar-profile', ['user' => $user])
  
  <main class="l-main__2colum u-site__width">

    @component('components.simpleList-section', ['items' => $postIdeas, 'list-name' => 'post-ideas'])

        @slot('title')
            投稿したアイデア
        @endslot

        @slot('url')
            {{ url('myideas-list') }}
        @endslot

    @endcomponent
    
    @component('components.simpleList-section', ['items' => $interestIdeas, 'list-name' => 'interests'])
        @slot('title')
            気になるリスト
        @endslot

        @slot('url')
            {{ url('interests-list') }}
        @endslot
    @endcomponent

    @component('components.simpleList-reviewSection', ['reviews' => $ideaReviews, 'list-name' => 'reviews'])
        @slot('title')
            レビュー一覧
        @endslot
    @endcomponent

  </main>
</div>
@endsection