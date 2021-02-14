<aside class="l-sidebar p-profileSidebar">
  @auth
  <div class="c-card p-profileSidebar__card">
    <div class="c-img--outer c-card-top p-profileSidebar__img--outer">
      <img class="c-img c-img--round p-profileSidebar__img" src="{{ asset('storage/images/icons/' . session('icon_img')) }}" alt="プロフィール画像">
    </div>
    <ul class="c-list p-profileSidebar__list">
      <li class="c-list__title p-profileSidebar__item">
        <p class="c-card__name p-profileSidebar__title">{{ session('name') }}</p>
      </li>
      <li class="c-list__item-simple p-profileSidebar__item">
        <a href="{{ url('mypage')}}" class="c-btn c-btn--white p-profileSidebar__btn">マイページへ</a>
      </li>
      <li class="c-list__item-simple p-profileSidebar__item">
        <a href="{{ route('profile.edit') }}" class="c-btn c-btn--white  p-profileSidebar__btn">プロフィール変更</a>
      </li>
      <li class="c-list__item-simple p-profileSidebar__item">
        <a href="{{ url('post-idea/create')}}" class="c-btn c-btn--white p-profileSidebar__btn">アイデアを<br>投稿する</a>
      </li>
      <li class="c-list__item-simple p-profileSidebar__item">
        <a href="{{ url('all-ideas-list')}}" class="c-btn c-btn--white p-profileSidebar__btn">アイデアを<br>探す</a>
      </li>
    </ul>
  </div>
  @endauth
  @guest

  <div class="c-card p-profileSidebar__card">
    <ul>
        <div class="c-card p-profileSidebar__card--sp">
          <div class="c-img--outer c-card--top p-profileSidebar__img--outer">

            <img class="c-img c-img--round p-profileSidebar__img" src="{{ asset('storage/images/icons/noimage_icon.jpg') }}"
            alt="プロフィール画像">
          </div>
          <li class="c-list__item-simple p-profileSidebar__item">
            <a class="c-btn__sidebar c-btn--white p-profileSidebar__btn"
            href="{{route('login')}}">ログイン</a>
          </li>
          <li class="c-list__item-simple p-profileSidebar__item">
              <a class="c-btn__sidebar c-btn--action p-profileSidebar__btn" href="{{route('register')}}">登録する</a>
          </li>
          <li class="c-list__item-simple p-profileSidebar__item">
            <a href="list" class="c-btn__sidebar c-btn--sub p-profileSidebar__btn">アイデアを<br>探す</a>
          </li>
        </>
      </ul>
    @endguest
  </div>
</aside>