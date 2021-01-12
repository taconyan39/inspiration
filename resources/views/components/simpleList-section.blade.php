<section class="p-ideaList">
  <h2 class="c-title__section p-ideaList__title">{{ $title }}</h2>
  <ul class="c-list p-ideaList__list">
    @foreach($ideas as $idea)
    <li class="c-list__item p-ideaList__listItem u-clearfix">
      <a href="#" class="c-list__link p-ideaList__listLink u-clearfix">
        <div class="p-ideaList__user">
          <div class="c-img--outer p-ideaList__userImg--outer">
            <img class="c-img p-ideaList__userImg" src="{{asset('/images/icon/icon_sample01.jpg')}}" alt="">
          </div>
        </div>
        <div class="p-ideaList__info">
          <div class="p-ideaList__info--top">
            <div class="p-ideaList__info--spec">
              <span class="p-ideaList__name">{{ $idea->user->name }}</span>
              <i class="fas fa-star fa-lg c-rating__icon"></i>
              <span>3.7</span>
              <span class="p-ideaList__rating--num"></span>
              <span class="c-tag p-ideaList__tag">{{ __($idea->category->name) }}</span>
            </div>
          </div>
          <div class="p-ideaList__info--bottom">
            <p class="c-txt p-ideaList__summary ">
              {{$idea->summary}}</p>
          </div>
        </div>
      </a>
    </li>
  @endforeach
  </ul>
</section>