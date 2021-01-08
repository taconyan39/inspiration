<section class="c-section p-review">
  <h2 class="c-title__content p-review__title">レビューピックアップ</h2>
  <ul class="p-review__list">
    @foreach($ideas as $idea)
    <li class="p-review__listItem c-card" >
      <a href="#" class="p-review__card">
        <div class="c-card--top p-review__card--top">
          <div class="c-info">
            <div class="c-info__box p-review__info--left">
              <time class="p-review__info--date">{{ $idea->created_at->format('Y/m/d') }}</time>
            </div>
            <div class="c-info__box">
              <i class="fas fa-star fa-lg c-rating__icon"></i>
              <span class="p-review__rating--num">3.7j</span>
            </div>
            <div class="c-info__box">
              <span class="c-price p-review__price">¥{{ $idea->price }}</span>
            </div>
          </div>

            <span class="c-tag p-attention__tag">{{ __($idea->category->name) }}</span>
            <p class="c-card__name p-review__summary">{{ $idea->summary }}</p>
        <hr class="c-card__partision p-review__card--partition">
        
        <div class="c-cardBottom p-review__card--bottom">
          <p class="c-txt p-review__text">{{ $idea->review}}</p>
        </div>
      </a>
    </li>
    @endforeach
  </ul>
</section>
    