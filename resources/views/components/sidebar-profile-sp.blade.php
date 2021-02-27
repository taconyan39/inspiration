<ul class="c-list p-profileSidebar--sp">

        <div class="c-card p-profileSidebar__card--sp">
        <div class="c-img--outer c-img--round c-card-top p-profileSidebar__img--outer">
            <img class="c-img p-profileSidebar__img" src="{{ session('icon_img')}}" alt="プロフィール画像">
        </div>
        <li class="c-list__title p-profileSidebar__item">
            <p class="c-card__name p-profileSidebar__title">{{ $user->name}}</p>
        </li>

        <li class=" p-profileSidebar__introduction">
            <span>自己紹介文</span>
            <div class="c-card p-profileSidebar__introduction--card">
                <p class="p-profileSidebar__introduction--text">
                {{$user->introduction}}
                </p>
            </div>
        </li>

        <li class="c-list__item-simple p-profileSidebar__item">
            <a href="{{ url('mypage') }}" class="c-btn__sidebar c-btn__sub p-profileSidebar__btn">マイページへ</a>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
            <a href="{{ route('profile.edit') }}" class="c-btn__sidebar c-btn__sub  p-profileSidebar__btn">プロフィール変更</a>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
            <a href="{{ url('post-idea/create') }}" class="c-btn__sidebar c-btn__sub p-profileSidebar__btn">アイデアを投稿する</a>
        </li>
        <li class="c-list__item-simple p-profileSidebar__item">
            <a href="{{ route('all-ideas-list')}}" class="c-btn__sidebar c-btn__sub p-profileSidebar__btn">アイデアを探す</a>
        </li>
        </div>
    </ul>