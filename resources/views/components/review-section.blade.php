<section class="c-content p-review">
  <h2 class="c-title__content p-review__title">レビュー</h2>
  <ul class="p-review__list">
    @foreach($ideas as $idea)
    <li class="p-review__listItem">
      <a href="#" class="c-card p-review__card">
        <div class="c-card--top p-review__card--top">
          <div class="c-img--outer p-review__img--outer">
            <img src="{{asset('/images/icon/' . $idea->user->icon_img)}}" alt="アイコン画像" class="c-img--round c-img p-review__cardImg">
          </div>
          <p class="c-card__name p-review__name">{{ $idea->user->name}}</p>
        </div>
        <hr class="c-card__partision p-review__card--partition">
        
        <div class="c-cardBottom p-review__card--bottom">
          <p class="c-txt p-review__card--txt">こんな素敵なアイデアに出会えると思っていませんでした。このアイデアを元に新しいサービスを展開していくイメージがとても湧いてきました。</p>
        </div>
      </a>
    </li>
    @endforeach
  </ul>
</section>
    