<section class="p-simpleList">
  <h2 class="c-title__section p-simpleList__title">{{ $title }}</h2>

  <select name="sort" id="sort">
    <option value="1">投稿日</option>
    <option value="2">カテゴリ</option>
    <option value="3">価格</option>
  </select>

  <select name="sort_sub" id="">
    <option value="1">新着順</option>
    <option value="2">古い順</option>
  </select>
  
  <select name="sort_sub" id="">
    <option value="1"></option>
    <option value="2"></option>
    <option value="3"></option>
    <option value="4"></option>
    <option value="5"></option>
    <option value="6"></option>
    <option value="7"></option>
  </select>


  <ul class="c-list p-simpleList__list">
    @foreach($items as $item)
    <li class="c-list__item p-simpleList__listItem u-clearfix">
      <a href="{{ url('./post-idea/'.$item->id)}}" class="c-list__link p-simpleList__listLink u-clearfix">
        <div class="p-simpleList__user">
          <div class="c-img--outer p-simpleList__userImg--outer">
            <img class="c-img p-simpleList__userImg" src="{{asset('/storage/images/icons/'.$item->user->icon_img)}}" alt="">
          </div>
        </div>
        <div class="p-simpleList__info">
          <div class="p-simpleList__info--top">
            <div class="p-simpleList__info--spec">
              <span class="p-simpleList__name">{{ $item->user->name }}</span>
              <i class="fas fa-star fa-lg c-rating__icon"></i>
              <span>3.7</span>
              <span class="p-simpleList__rating--num"></span>
              <span class="c-tag p-simpleList__tag"></span>
            </div>

          </div>
          <div class="p-simpleList__info--bottom">
            <p class="c-txt p-simpleList__summary ">
              {{$item->summary}}</p>
          </div>
        </div>
      </a>
    </li>
  @endforeach
  </ul>
</section>