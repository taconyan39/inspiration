@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">
        @include('components.sidebar-profile')
    <main class="l-main__2colum">
        @auth
            @include('components.article', ['idea' => $idea, 'buy_flg' => $buy_flg, 'interest_flg' => $interest_flg, 'myreview' => $myreview])
            
        @endauth

        @guest
            @include('components.article', ['idea' => $idea])

        @endguest

        <idea-reviews :id="{{$idea->id}}"></idea-reviews>
        
        <div class="c-link__container">
            <a href="{{url()->previous()}}" class="c-link__underline">&lt;&lt; 前のページに戻る</a>
        </div>
    </main>
</div>
@endsection
