
<h2 class="c-title__section p-ideaList__title">{{ $title }}</h2>

  <ul class="c-list p-ideaList__list">
    @foreach($items as $item)
    <li class="c-list__item p-ideaList__item u-clearfix">
      <div class="p-ideaList__top c-flex--between">
          
        <div class="p-ideaList__topBox">
          <time class="p-ideaList__date">{{ $item->created_at->format('Y/m/d') }}</time>
        </div>
        <div class="c-dammy p-ideaList__topBox"></div>
        <div class="p-ideaList__topBox">
          <span class="p-ideaList__rating c-rating">{{ $item->rating }} ({{ $item->countReview }})</span>
        </div>
        <div class="p-ideaList__topBox">
          <span class="c-price p-ideaList__price">¥{{ $item->price }}</span>
        </div>
      </div>

      <div class="c-row p-ideaList__title--wrapper">
        <h3 class="c-list__title p-ideaList__title">{{ $item->title }}</h3>
      </div>


        <div class="p-ideaList__body">
          <div class="p-ideaList__body--left">

            <span class="c-tag p-ideaList__body--tag">{{ $item->category->name_ja }}</span>
              
            <div class="p-ideaList__userCard c-card">
              <div class="c-img--outer c-card--top p-ideaList__userImg--outer">
                <img class="c-img--round p-ideaList__userImg" src="{{ asset('storage/images/icons/' . $item->user->icon_img) }}" alt="">
              </div>
              <div class="c-card--bottom p-ideaList__userCard--bottom">
                <p class="c-card__name">{{ $item->user->name }}</p>
              </div>
            </div>
          </div>
          
          <div class="p-ideaList__body--right">
            
            <div class="p-ideaList__summary">
              <p class="c-txt p-ideaList__summary ">{{$item->summary}}</p>
            </div>
            
            <div class="p-ideaList__bottom">
              @component('components.list-btn',['item' => $item, 'listType' => $listType])
              @endcomponent
            </div>
          </div>
        </div>

        <div class="p-ideaList__bottom--sp">
            @component('components.list-btn',['item' => $item, 'listType' => $listType])
              @endcomponent
        </div>
        
      </li>
      @endforeach
    </ul>
