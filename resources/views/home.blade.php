@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  
  @include('components.sidebar-profile', ['user' => $user])
  
  <main class="l-main__2colum u-site__width">
    @component('components.simpleList-section', ['ideas' => $ideas, 'user'=>$user])
        @slot('title')
            購入したアイデア
        @endslot
    @endcomponent

    @component('components.simpleList-section', ['ideas' => $ideas, 'user'=>$user])
        @slot('title')
            投稿したアイデア
        @endslot
    @endcomponent

    @component('components.simpleList-section', ['ideas' => $ideas, 'user'=>$user])
        @slot('title')
            レビュー
        @endslot
    @endcomponent
    
    @component('components.simpleList-section', ['ideas' => $ideas, 'user'=>$user])
        @slot('title')
            気になるリスト
        @endslot
    @endcomponent
    
    
  </main>
</div>
@endsection