<section class="c-section p-ideaList">
  <h2 class="c-title__section p-ideaList__title">{{ $title }}</h2>

  <ul class="c-list p-ideaList__list">
    @foreach($ideas as $idea)
    <li class="c-list__item p-ideaList__item u-clearfix">
          <div class="p-ideaList__top c-flex--between">
              
            <div class="p-ideaList__topBox">
              <time class="p-ideaList__date">{{ $idea->created_at->format('Y/m/d') }}</time>
            </div>
            <div class="c-dammy p-ideaList__topBox"></div>
            <div class="p-ideaList__topBox">
              <span class="p-ideaList__rating c-rating">{{ $idea->rating }} ({{ $idea->countReview }})</span>
            </div>
            <div class="p-ideaList__topBox">
              <span class="c-price p-ideaList__price">¥{{ $idea->price }}</span>
            </div>
          </div>

          <div class="c-row p-ideaList__title--wrapper">
            <h3 class="c-list__title p-ideaList__title">{{ $idea->title }}</h3>
          </div>


          <div class="p-ideaList__body">
            <div class="p-ideaList__body--left">

              <span class="c-tag p-ideaList__body--tag">{{ $idea->category->name_ja }}</span>
                
              <div class="p-ideaList__userCard c-card">
                <div class="c-img--outer c-card--top p-ideaList__userImg--outer">
                  <img class="c-img--round p-ideaList__userImg" src="{{asset('images/icons/' . $idea->user->icon_img )}}" alt="">
                </div>
                <div class="c-card--bottom p-ideaList__userCard--bottom">
                  <p class="c-card__name">{{ $idea->user->name }}</p>
                </div>
              </div>
            </div>
            
            <div class="p-ideaList__body--right">
              
              <div class="p-ideaList__summary">
                <p class="c-txt p-ideaList__summary ">{{$idea->summary}}</p>
              </div>
              
              <div class="p-ideaList__bottom">
                @component('components.list-item',['idea' => $idea])
                @endcomponent
              </div>
            </div>
          </div>

          <div class="p-ideaList__bottom--sp">
              @component('components.list-item',['idea' => $idea])
                @endcomponent
          </div>
          
        </li>
        @endforeach
      </ul>
</section>