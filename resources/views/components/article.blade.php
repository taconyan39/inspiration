<article class="p-ideaDetail c-article">

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
                <span class="c-tag--large p-ideaDetail__infoItem--tag">{{ $idea->category->name }}</span>
            </div>
            <div class="c-flex--end p-ideaDetail__user">
                <div class="c-img--outer c-img--round p-ideaDetail__userImg--outer">
                    <img class="c-img p-ideaList__userImg" src="{{ asset('storage/images/icons/' . $idea->user->icon_img) }}" alt="アイコン画像">
                        
                    </div>
                    
                    <span class="p-ideaDetail__user--name">{{ $idea->user->name }}<span>
                </div>
            </div>
        
        <div class="p-ideaDetail__summary">
            <h3>{{ $idea->summary }}</h3>
        </div>

        <div class="p-ideaDetail__text--wrapper">
            @auth
                @if($buy_flg)
                    <div class="p-ideaDetail__purchased">
                        <p class="p-ideaDetail__text">{{ $idea->content }}</p>
                    </div>
                </div>
            </div>

        </article>

        <section class="p-ideaDetail__review">

            @if( $myreview )
                <p class="p-ideaDetail__reviewText">レビューは投稿済みです</p>
            @else
                <p class="p-ideaDetail__reviewText">レビューを書いて投稿しよう！！</p>
                <form action="{{ url('reviews/' . $idea->id)}}" method="POST">
                    @csrf
                    <div class="p-ideaDetail__reviewForm ">
                        <label class="c-flex--start p-ideaDetail__reviewForm--row">
                            <select name="rating" id="" class="p-postReview__form--select c-selectBox">
                                <option value="">評価</option>

                                @for($i = 5; $i > 0; $i-- )
                                    <option value="{{$i}}">
                                        @for($x = 1; $x <= $i; $x++)
                                        <span class="c-star">★</span>
                                        @endfor
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="c-flex--start">
                            @error('rating')
                                <span class="c-error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <post-review></post-review>

                        <div class="c-flex--end">
                            @error('review')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    <div class="c-form__row p-postReview__formRow--btn c-flex--end">
                        <button type="submit" class="c-btn p-postReview__form--btn c-btn--action2">レビューを投稿する</button>
                    </div>
                </form>
            @endif
        </section>
        @else
            <div class="p-ideaDetail__purchased--not">
                <p class="p-ideaDetail__text--not">購入すると表示されます</p>
                <p class="p-ideaDetail__price--large">¥{{ $idea->price }}</p>
                <form action="{{ url('post-idea/buy/' . $idea->id) }}" method="POST">
                @csrf
                    <buy-component></buy-component>
                </form>
            </div>

            <div class="c-article__bottom p-ideaDetail__bottom">
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>

                <interest-component :id="{{ $idea->id }}" :interest="@json($interest_flg)"></interest-component>
            </div>
        @endif

        </article>
        @endauth

            @guest

                <div class="p-ideaDetail__nologin">
                    <p>購入すると続きを読むことができます</p>
                    <div class="p-ideaDetail__nologinBtn--wrapper c-btn__wrapper">
                        <a
                        href="{{ route('login') }}"
                        class="p-ideaDetail__nologinBtn  c-btn--action3 c-btn">ログインする</a>
                    </div>
                </div>

            </div>


    </article>

    @endguest
