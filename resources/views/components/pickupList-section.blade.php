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
            <div class="c-info__box c-dammy p-attention__infoBox"></div>
            <div class="c-info__box p-attention__infoBox">
              <span class="p-attention__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
            </div>
            <div class="c-info__box p-attention__infoBox">
              <span class="c-price p-attention__price">¥{{ $idea->price }}</span>
            </div>
          </div>
          <div class="p-attention__infoBox--bottom">
            <span class="c-tag p-attention__infoBox--tag">{{ $idea->category->category_name }}</span>
            <h3 class="c-list__item--title p-attention__infoBox--title">{{ $idea->title }}</h3>
          </div>

          <!-- body -->
          <div class="p-attention__body">

            <div class="p-attention__user">
              <div class="p-attention__userCard c-card">
                <div class="c-img--outer c-card--top p-attention__userImg--outer">

                  <img class="c-img p-attention__userImg" src="{{asset('storage/images/icons/' . $idea->user->icon_img )}}" alt="">
                </div>
                <div class="c-card--bottom p-attention__userCard--bottom">
                  <p class="c-card__name">{{ $idea->user->name }}</p>
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