<section class="p-ideaList">

  <h2 class="c-title__section p-ideaList__title">{{ $title }}</h2>

  <ul class="c-list p-ideaList__list">

    @foreach($reviews as $review)
      <li class="c-list__item p-simpleList__listItem u-clearfix">
        <a href="{{ url('./post-idea/' . $review->idea_id )}}" class="c-list__link p-simpleList__listLink u-clearfix">

        <!-- 情報部分 -->
          <!-- <div class="p-ideaList__user">
            <div class="c-img--outer p-ideaList__userImg--outer">
              <img class="c-img p-ideaList__userImg" src="{{asset('/images/icon/'.$review->icon_img)}}" alt="">
            </div>
          </div> -->

          <div class="p-simpleList__user">
            <div class="c-img--outer c-img--round p-simpleList__userImg--outer">
              @if( $review->user->icon_img )
                <img class="c-img p-simpleList__userImg" src="{{ $review->icon_img }}" alt="プロフィール画像">
              @else
                <img class="c-img p-simpleList__userImg" src="{{asset('images/icons/noimage_icon.png')}}" alt="プロフィール画像">
              @endif  
            </div>
          </div>


          <!-- 情報部分 -->
          <div class="p-simpleList__info">
            <div class="p-simpleList__info--top">
              <div class="p-simpleList__info--spec">
                <span class="p-simpleList__name">{{ $review->user->name }}</span>
                <span class="c-rating">{{ $review->rating  }}</span>
                <span class="p-simpleList__rating--num"></span>
                <span class="c-tag p-simpleList__tag">{{ $review->idea->category->name_ja}}</span>
              </div>
            </div>

            <div class="p-simpleList__info--middle">
              <div class="p-simpleList__info--title">
                <p>{{ $review->idea->title }}</p>
              </div>
            </div>

            <!-- 概要部分 -->
            <div class="p-simpleList__info--bottom">
              <p class="c-txt p-simpleList__summary ">
                {{$review->review}}</p>
            </div>

          </div>
        </a>
      </li>
    @endforeach

  </ul>
  <!-- 全件表示 -->
  <div class="p-simpleList__bottom">
    <a href="{{ url('post-idea') }}" class="c-link__underline">全件表示</a>
  </div>
</section>