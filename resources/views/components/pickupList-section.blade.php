<!-- アイデア名、価格、カテゴリ、概要、投稿日、口コミ数￥、平均評価点数 -->

<section class="c-section p-attention">
  <h2 class="c-title__section p-attention__title">{{ $title }}</h2>
  <ul class="c-list p-attention__list">
    @foreach($ideas as $idea)
    <li class="c-list__item p-attention__listItem u-clearfix">
      <a href="#" class="c-list__link p-attention__listLink u-clearfix">
          <div class="p-attention__info c-info">
            <!-- <div class="p-attention__tag"> -->
              
            <div class="c-info__box p-attention__infoBox--left">
              <time class="p-attention__info--date">{{ $idea->created_at->format('Y/m/d') }}</time>
            </div>
            <!-- </div> -->
            <!-- <i class="fas fa-star fa-lg c-rating__icon"></i>
            <i class="fas fa-star fa-lg c-rating__icon"></i>
            <i class="far fa-star fa-lg c-rating__icon"></i>
            <i class="far fa-star fa-lg c-rating__icon"></i> -->
            <div class="c-info__box c-dammy p-attention__infoBox"></div>
            <div class="c-info__box p-attention__infoBox">
              <i class="fas fa-star fa-lg c-rating__icon"></i>
              <span class="p-attention__rating--num">3.7</span>
              <span>(33)</span>
            </div>
            <div class="c-info__box p-attention__infoBox">
              <span class="c-price p-attention__price">¥{{ $idea->price }}</span>
            </div>
          </div>
          <div class="p-attention__body">

            <div class="p-attention__user">
              <div class="p-attention__userCard c-card">
                <div class="c-img--outer c-card--top p-attention__userImg--outer">
                  <img class="c-img p-attention__userImg" src="{{asset('/images/icon/' . $idea->user->icon_img )}}" alt="">
                </div>
                <div class="c-card--bottom p-attention__userCard--bottom">
                </div>
              </div>
            </div>
            <div class="c-info__item">
              
              <div class="p-attention__summary">

                <div class="p-attention__text--container">
                  <p class="c-txt p-attention__text ">{{$idea->summary}}</p>
                </div>
              </div>
            </div>
          </div>
            
      </a>
    </li>
  @endforeach
  </ul>
</section>