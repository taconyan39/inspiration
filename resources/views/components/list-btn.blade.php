@switch($listType)

@case(1)
<!-- 投稿アイデアリストの場合 -->
  <div class="p-ideasList__btn--wrapper c-flex--around">
    @if($idea->sold_flg)
      <a href="" class="c-btn--enable c-btn p-ideasList__btnEdit--enable">編集不可</a>
    @else
      <a href="{{ url('post-idea/'. $idea->id . '/edit')}}" class="c-btn c-btn--white p-ideasList__btnEdit">編集する</a>
    @endif
      <a href="{{ url('post-idea/' . $idea->id) }}" class="c-btn c-btn--action2 p-ideasList__btn">詳細を見る</a>
    </div>
    @break
    
    @case(2)
    <!-- お気に入りリストの場合 -->
      <div class="p-ideasList__btn--wrapper c-flex--around">
        <form action="" method="POST">
          @csrf
            <input type="hidden" name="idea_id" value="{{ $idea->id }}">
            <button class="c-btn c-btn--white p-ideasList__btn" type="submit" name="submit">
              <span class="c-star"></span> 解除する
            </button>
        </form>
          <a href="{{ url('post-idea/' . $idea->id) }}" class="c-btn c-btn--action2 p-ideasList__btn">詳細を見る</a>
      </div>
        <!-- 気にリストに入っている場合 -->
        @break



    @default
      <!-- 基本的な場合 -->
      <div class="p-ideasList__btn--wrapper c-flex--end-sp">
        <a href="{{ url('idea/' . $idea->id) }}" class="c-btn c-btn--action2 p-ideasList__btn">詳細を見る</a>
      </div>
      
@endswitch