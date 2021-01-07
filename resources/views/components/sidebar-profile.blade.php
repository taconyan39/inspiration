<aside class="l-sidebar p-profileList">
  <div class="c-card p-profileList__card">
    <div class="c-img--outer c-card-top p-profileList__img--outer">
      <img class="c-img p-profileList__img" src="{{asset('images/icon/icon_sample01.jpg') }}" alt="">
    </div>
    <ul class="c-list p-profileList__list">
      <li class="c-list__title p-profileList__item">
        <p class="c-card__name p-profileList__title">{{ $user->name }}</p>
      </li>
      <li class="c-list__item p-profileList__item">
        <a href="#" class="c-link__underline">プロフィール変更</a>
      </li>
    </ul>
  </div>
</aside>