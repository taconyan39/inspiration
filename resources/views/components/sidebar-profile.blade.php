<aside class="l-sidebar p-profileSidebar ">
  <div class="c-card p-profileSidebar__card">
    <div class="c-img--outer c-card-top p-profileSidebar__img--outer">
    @if($user->icon_img)
      <!-- <img class="c-img c-img--round p-profileSidebar__img" src="{{ asset('storage/images/icons/' . $user->icon_img) }}" alt="プロフィール画像"> -->
      <img class="c-img c-img--round p-profileSidebar__img" src="{{ $user->icon_img }}" alt="プロフィール画像">
    @else
      <!-- <img class="c-img c-img--round p-profileSidebar__img" src="{{asset('images/icon/noimage_icon.png') }}" alt="プロフィール画像"> -->
    @endif
    </div>
    <ul class="c-list p-profileSidebar__list">
      <li class="c-list__title p-profileSidebar__item">
        <p class="c-card__name p-profileSidebar__title">{{ $user->name }}</p>
      </li>
      <li class="c-list__item-simple p-profileSidebar__item">
        <a href="{{ url('mypage')}}" class="c-btn p-profileSidebar__btn">マイページへ</a>
      </li>
      <li class="c-list__item-simple p-profileSidebar__item">
        <a href="{{ route('profile.edit') }}" class="c-btn p-profileSidebar__btn">プロフィール変更</a>
      </li>
      <li class="c-list__item-simple p-profileSidebar__item">
        <a href="{{ url('post-idea/create')}}" class="c-btn p-profileSidebar__btn">アイデアを<br>投稿する</a>
      </li>
    </ul>
  </div>
</aside>