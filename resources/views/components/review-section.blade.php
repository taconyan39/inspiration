<section class="c-section p-review">
  <h2 class="c-title__content p-review__title">レビューピックアップ</h2>
  <ul class="p-review__list">
    @foreach($reviews as $review)
    <li class="p-review__listItem c-card" >
      <a href="#" class="p-review__card c-list__link">
        <div class="c-card--top p-review__card--top">
          <div class="c-info">
            <div class="c-info__box p-review__info--left">
              <time class="p-review__info--date">{{ $review->created_at->format('Y/m/d') }}</time>
            </div>
            <div class="c-info__box">
              <!-- <i class="fas fa-star c-rating__icon"></i> -->
              <span class="p-review__rating--num c-rating">{{ $review->idea->rating }}({{ $review->idea->countReview}})</span>
            </div>
            <div class="c-info__box">
              <span class="c-price p-review__price">¥{{ $review->idea->price }}</span>
            </div>
          </div>

            <!-- <span class="c-tag p-attention__tag">{{ __($review->idea->category->name) }}</span> -->
          <p class="c-card__name p-review__summary">{{ $review->idea->summary }}</p>
          <hr class="c-card__partision p-review__card--partition">
          <div class="c-card__body p-review__cardBody">
            <p class="p-review__cardText">{{$review->review  }}</p>
          </div>
        </div>

      </a>
    </li>
    @endforeach
  </ul>
</section>
    