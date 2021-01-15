@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  
  @include('components.sidebar-profile', ['user' => $user])
  
  <main class="l-main__2colum u-site__width">

  <a class="c-btn" href="{{ url('post-idea/create') }}">アイデアを投稿する</a>

    @component('components.simpleList-section', ['items' => $postIdeas])
        @slot('title')
            投稿したアイデア
        @endslot

    @endcomponent

    @component('components.simpleList-section', ['items' => $interestIdeas])
        @slot('title')
            気になるリスト
        @endslot
    @endcomponent

    
  </main>
</div>
@endsection