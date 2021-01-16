@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">

        @include('components.sidebar-profile',['user' => $user])
        
        <main class="c-form__wrapper p-ideaPost ">
        <div class="p-ideaPost__title c-form__header">
            <h2 class="c-form__title">{{ $idea->title}}</h2>
        </div>
        
        <div>
            <h3>{{ $idea->summary }}</h3>
        </div>
        <div>
            <span>{{ $idea->category->name}}</span>
            <span><i class="fas fa-star fa-lg c-rating__icon"></i>{{$idea->rating}}({{$idea->countReview}})</span>
            <span>¥ {{ $idea->price }}</span>
        </div>
        <p>{{ $idea->content }}</p>

        <form action="{{ route('test') }}" method="post">
            <input type="submit" value="Twitter">
        </form>

        @component('components.review-section',['ideaReviews' => $ideaReviews])
        @endcomponent

        <div>
            <a href="#">全件表示する</a>
        </div>

    </main>
    <div class="c-link__conainer">
    </div>
        <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
</div>
@endsection
