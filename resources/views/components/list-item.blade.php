<div class="p-ideaList__btn--wrapper c-flex--around">
  <a href="{{ url('post-idea/' . $idea->id) }}" class="c-btn p-ideaList__btn--detail">詳細を見る</a>
  @if($idea->buyIdea->isEmpty())
    <a href="{{ url('post-idea/'. $idea->id . '/edit')}}" class="c-btn p-ideaList__btnEdit">編集する</a>
  @else
    <a href="" class="c-btn--enable c-btn p-ideaList__btnEdit--enable">編集不可</a>
  @endif
</div>