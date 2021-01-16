<section class="p-ideaList">

  <h2 class="c-title__section p-ideaList__title">{{ $title }}</h2>

  <ul class="c-list p-ideaList__list">

    @foreach($reviews as $review)
      <li class="c-list__item p-ideaList__listItem u-clearfix">
        <a href="{{ url('./post-idea/'.$review->id)}}" class="c-list__link p-ideaList__listLink u-clearfix">

        <!-- 情報部分 -->
          <div class="p-ideaList__user">
            <div class="c-img--outer p-ideaList__userImg--outer">
              <img class="c-img p-ideaList__userImg" src="{{asset('/images/icon/'.$review->icon_img)}}" alt="">
            </div>
          </div>

          <!-- タイトル部分 -->
          <div class="p-ideaList__info">
            <div class="p-ideaList__info--top">
              <div class="p-ideaList__info--spec">
                <span class="p-ideaList__name">{{ $review->name }}</span>
                <span class="c-rating">{{ $review->rating  }}</span>
                <span class="p-ideaList__rating--num"></span>
                <span class="c-tag p-ideaList__tag">{{ $review->category_name}}</span>
              </div>
            </div>

            <!-- 概要部分 -->
            <div class="p-ideaList__info--bottom">
              <p class="c-txt p-ideaList__summary ">
                {{$review->summary}}</p>
            </div>

          </div>
        </a>
      </li>
    @endforeach

  </ul>
  <!-- 全件表示 -->
  <div class="p-ideaList__bottom">
    <a href="{{ url('post-idea') }}" class="c-link__underline">全件表示</a>
  </div>
</section>