<section class="p-ideaList">
  <h2 class="c-title__section p-ideaList__title">{{ $title }}</h2>
  <ul class="c-list p-ideaList__list">
    @foreach($items as $item)
    <li class="c-list__item p-ideaList__listItem u-clearfix">
      <a href="{{ url('./post-idea/'.$item->id)}}" class="c-list__link p-ideaList__listLink u-clearfix">
        <div class="p-ideaList__user">
          <div class="c-img--outer p-ideaList__userImg--outer">
            <img class="c-img p-ideaList__userImg" src="{{asset('/images/icon/'.$item->user->icon_img)}}" alt="">
          </div>
        </div>
        <div class="p-ideaList__info">
          <div class="p-ideaList__info--top">
            <div class="p-ideaList__info--spec">
              <span class="p-ideaList__name">{{ $item->user->name }}</span>
              <i class="fas fa-star fa-lg c-rating__icon"></i>
              <span>{{ $item->rating  }}</span>
              <span class="p-ideaList__rating--num">({{ $item->reviewsCount }})</span>
              <span class="c-tag p-ideaList__tag">{{ $item->category->name}}</span>
            </div>
          </div>
          <div class="p-ideaList__info--bottom">
            <p class="c-txt p-ideaList__summary ">
              {{$item->summary}}</p>
          </div>
        </div>
      </a>
    </li>
  @endforeach
  </ul>
  <div><a href="{{ url('post-idea') }}">全件表示</a></div>
</section>