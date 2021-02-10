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

                    <div class="p-ideaDetail__info c-flex--between">
                        
                        <div class="c-info__box p-ideaDetail__infoItem--left">
                            <time class="p-ideaDetail__info--date">{{ $idea->created_at->format('Y/m/d') }}</time>
                        </div>

                        <div class="c-dammy">
                        </div>
                        <div class="c-info__box p-ideaDetail__infoItem">
                            <span class="p-ideaDetail__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
                        </div>
                        <div class="c-info__box p-ideaDetail__infoItem">
                            <span class="c-price p-ideaDetail__price">¥{{ $idea->price }}</span>
                        </div>
                    </div>
                    
                    <div class="p-ideaDetail__info c-row c-flex--between">
                        <div>
                            <span class="c-tag p-ideaDetail__infoItem--tag">{{ $idea->category->name }}</span>
                        </div>
                        <div class="c-flex--end p-ideaDetail__user">
                            <div class="c-img--outer c-img--round p-ideaDetail__userImg--outer">
                                <img class="c-img--round p-ideaList__userImg" src="{{ asset('storage/images/icons/' . $idea->user->icon_img) }}" alt="アイコン画像">
                                    
                                </div>
                                
                                <span class="p-ideaDetail__user--name">{{ $idea->user->name }}<span>
                            </div>
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
                                <span class="p-ideaDetail__message">¥{{ $idea->price }}</span>
                                <form action="{{ url('post-idea/buy/' . $idea->id) }}" method="POST">
                                @csrf
                                    <buy-component></buy-component>
                                </form>
                            </div>
                        @endif
                            @else

                            <div class="p-ideaDetail__nologin">
                                <p>購入するにはログインが必要です</p>

                                <div class="p-ideaDetail__nologin--wrapper">
                                    <a
                                    href="{{ route('login') }}"
                                    class="p-ideaDetail__text c-btn  c-btn__second">ログインする</a>
                                </div>
                            </div>

                        @endif
                    </div>

                    <div class="c-article__bottom p-ideaDetail__bottom">
                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>

                        <interest-component :id="{{ $idea->id }}" :interest="@json($interest_flg)"></interest-component>
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

            <idea-reviews :reviews="{{ $reviews }}" :id="{{$idea->id}}"></idea-reviews>
        
        <div class="c-link__conainer">
            <a href="{{url()->previous()}}" class="c-link__underline">&lt;&lt; 前のページに戻る</a>
        </div>
    </main>
    </div>
@endsection
