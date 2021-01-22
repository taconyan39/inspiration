<section class="p-simpleList">

  <h2 class="c-title__section p-simpleList__title">{{ $title }}</h2>

  <ul class="c-list p-simpleList__list">

    @foreach($items as $item)
      <li class="c-list__item p-simpleList__listItem u-clearfix">
        <a href="{{ url('./post-idea/'.$item->id)}}" class="c-list__link p-simpleList__listLink u-clearfix">

        <!-- 情報部分 -->
          <div class="p-simpleList__user">
            <div class="c-img--outer p-simpleList__userImg--outer">
              <img class="c-img p-simpleList__userImg" src="{{asset('storage/images/icons/'.$item->user->icon_img)}}" alt="プロフィール画像">
            </div>
          </div>

          <!-- タイトル部分 -->
          <div class="p-simpleList__info">
            <div class="p-simpleList__info--top">
              <div class="p-simpleList__info--spec">
                <span class="p-simpleList__name">{{ $item->user->name }}</span>
                <span class="c-rating">{{ $item->rating  }}</span>
                <span class="p-simpleList__rating--num">({{ $item->countReview }})</span>
                <span class="c-tag p-simpleList__tag">{{ $item->category->category_name}}</span>
              </div>
            </div>

            <!-- 概要部分 -->
            <div class="p-simpleList__info--bottom">
              <p class="c-txt p-simpleList__summary ">
                {{$item->summary}}</p>
            </div>

          </div>
        </a>
      </li>
    @endforeach

  </ul>
  <!-- 全件表示 -->
  <div class="p-simpleList__bottom">
    <a href="{{ url('ideas-list/all' ) }}" class="c-link__underline">全件表示</a>
  </div>
</section>