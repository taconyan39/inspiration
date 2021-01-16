@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
    <div class="l-wrapper__2colum u-site__width">

        @include('components.sidebar-profile',['user' => $user])
        
        <main class="l-main__2colum">
            <article class="p-ideaDetail">

                <div class="p-ideaDetail__title c-form__header">
                    <h2 class="c-form__title">{{ $idea->title}}</h2>
                </div>

                <div class="p-ideaDetail__content">

                    <div class="p-ideaDetail__info c-info">
                        
                        <div class="c-info__box p-ideaDetail__infoItem--left">
                        <time class="p-ideaDetail__info--date">{{ $idea->created_at->format('Y/m/d') }}</time>
                        </div>
                        <div class="c-info__box c-dammy p-ideaDetail__infoItem"></div>
                        <div class="c-info__box p-ideaDetail__infItem">
                        <span class="p-ideaDetail__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
                        </div>
                        <div class="c-info__box p-ideaDetail__infoItem">
                        <span class="c-price p-ideaDetail__price">¥{{ $idea->price }}</span>
                        </div>
                    </div>
                    
                    <div class="p-ideaDetail__infoItem--bottom">
                        <span class="c-tag p-ideaDetail__infoItem--tag">{{ $idea->category->category_name }}</span>
                        <span class="p-ideaDetail__infoItem--name">{{ $idea->user->name }}<span>
                            </div>
                <div>
                    <div class="p-ideaDetail__summary">
                        <h3>{{ $idea->summary }}</h3>
                    </div>
                    
                    <div class="p-ideaDetail__text--wrapper">
                        <p class="p-ideaDetail__text">{{ $idea->content }}</p>
                    </div>
                    
                    <form action="{{ route('test') }}" method="post">
                        <label for="" class="c-btn__twitter">
                            <i class="fab fa-twitter"></i>
                            <input type="submit" value="Twitter" class="c-btn c-btn__twitter--input">
                        </label>
                        <span class="c-btn__prompt">Twitterでシェアしよう！！</span>
                    </form>
                </div>
            </div>
        </article>

    <section class="p-simpleList">

    <ul class="c-list p-simpleList__list">

        @foreach($reviews as $review)
        <li class="c-list__item p-simpleList__listItem u-clearfix">
            <a href="{{ url('./post-idea/'.$review->id)}}" class="c-list__link p-simpleList__listLink u-clearfix">

            <!-- 情報部分 -->
            <div class="p-simpleList__user">
                <div class="c-img--outer p-simpleList__userImg--outer">
                <img class="c-img p-simpleList__userImg" src="{{asset('/images/icon/'.$review->user->icon_img)}}" alt="">
                </div>
            </div>

            <!-- タイトル部分 -->
            <div class="p-simpleList__info">
                <div class="p-simpleList__info--top">
                <div class="p-simpleList__info--spec">
                    <span class="p-simpleList__name">{{ $review->user->name }}</span>
                    <span class="c-rating">{{ $review->rating  }}</span>
                    <span class="p-simpleList__rating--num"></span>
                    <span class="c-tag p-simpleList__tag">{{ $review->idea->category->category_name}}</span>
                </div>
                </div>

                <!-- 概要部分 -->
                <div class="p-simpleList__info--bottom">
                <p class="c-txt p-simpleList__summary ">
                    {{$review->review}}</p>
                </div>

            </div>
            </a>
        </li>
        @endforeach

    </ul>
    <!-- 全件表示 -->
    <div class="p-simpleList__bottom">
        <a href="{{ url('post-idea') }}" class="c-link__underline">全件表示</a>
    </div>
</section>
<div class="c-link__conainer">
</div>
    <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
</div>

        </main>
@endsection
