@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
    <div class="l-wrapper__2colum u-site__width">
        @if($user)
            @include('components.sidebar-profile',['user' => $user])
        @else
            @include('components.sidebar-category',['categories' => $categories])
        @endif
        
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
                        <div class="c-info__box p-ideaDetail__infoItem">
                            <span class="p-ideaDetail__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
                        </div>
                        <div class="c-info__box p-ideaDetail__infoItem">
                            <span class="c-price p-ideaDetail__price">¥{{ $idea->price }}</span>
                        </div>
                    </div>
                    
                    <div class="p-ideaDetail__infoItem--bottom">
                        <span class="c-tag p-ideaDetail__infoItem--tag">{{ $idea->category->name }}</span>
                        <span class="p-ideaDetail__infoItem--name">{{ $idea->user->name }}<span>
                    </div>
                    
                    <div class="p-ideaDetail__summary">
                        <h3>{{ $idea->summary }}</h3>
                    </div>
                    
                    <div class="p-ideaDetail__text--wrapper">
                        @if($user)
                        @if($idea->where('user_id','=','$user->id'))
                            <div class="p-ideaDetail__purchased">
                                    <p class="p-ideaDetail__text">{!! nl2br(e($idea->content)) !!}</p>
                                </div>
                        @elseif($buy_flg)
                            <div class="p-ideaDetail__purchased">
                                <p class="p-ideaDetail__text">{{ $idea->content }}</p>
                            </div>
                        @else
                            <div class="p-ideaDetail__purchased--not">
                                <p class="p-ideaDetail__text--not">購入すると表示されます</p>
                                <!-- ○名がすでに購入されました -->
                                <span class="p-ideaDetail__message">¥{{ $idea->price }}</span>
                                <form action="{{ url('post-idea/buy/' . $idea->id) }}" method="POST">
                                @csrf
                                    <buy-component></buy-component>
                                </form>
                            </div>
                        @endif
                            @else

                            <div class="p-ideaDetail__purchased--not">
                                <a
                                href="{{ route('login') }}"
                                class="p-ideaDetail__text--not c-btn">購入にはログインが必要です</a>
                                <!-- ○名がすでに購入されました -->
                                <!-- <span class="p-ideaDetail__message">¥{{ $idea->price }}</span> -->
                                <!-- <form action="{{ url('post-idea/buy/' . $idea->id) }}" method="POST"> -->
                                <!-- @csrf -->
                                    <!-- <buy-component></buy-component> -->
                                <!-- </form> -->
                            </div>

                        @endif
                    </div>

                    <div class="c-article__bottom p-ideaDetail__bottom">
                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>

                        <interest-component :idea="{{ $idea }}" :interest="@json($interest_flg)"></interest-component>
                        <!-- <form method="post" action="{{ url('post-idea/interest/' . $idea->id) }}">
                            @csrf
                            
                            @if($interest_flg)
                                <input class="c-btn c-rating  p-ideaDetail__btn--interest" name="remove" value="解除する" type="submit">
                            @else
                                <input class="c-btn c-rating--empty  p-ideaDetail__btn--interest" name="interest" value="気になる" type="submit">
                            @endif
                        </form> -->
                    </div>
                </div>

            </article>
    
            @if($buy_flg)
            <section class="p-ideaDetail__review">

                @if( $myreview )
                <p class="p-ideaDetail__reviewText">あなたの口コミ</p>
                <div>{{ $myreview->review }}</div>
                @else
                <p class="p-ideaDetail__reviewText">レビューを書いて投稿しよう！！</p>
                <form action="{{ url('post-idea/post-review/' . $idea->id)}}" method="POST">
                @csrf
                <post-review></post-review>
                </form>
                @endif
            </section>
            @endif

            <section class="p-simpleList">
            @if($reviews->isEmpty())
                    <div class="p-simpleList--none">レビューはまだ投稿されていません</div>
                @else

            <ul class="c-list p-simpleList__list">

                <p class="p-ideaDetail__reviewTitle">みんなのレビュー</p>

                <!-- <reviews-component :data="items"></reviews-component> -->

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
                            <span class="c-tag p-simpleList__tag">{{ $review->idea->category->name_ja}}</span>
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
            @endif
        </section>
        
        <div class="c-link__conainer">
            <a href="{{url()->previous()}}" class="c-link__underline">&lt;&lt; 前のページに戻る</a>
        </div>
    </main>
    </div>
@endsection
