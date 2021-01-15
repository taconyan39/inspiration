@extends('layouts.app')

@section('title', 'マイページ')
@section('content')

<div class="l-wrapper__2colum u-site__width">

  
  <sidebar-category></sidebar-cateogry>
  
  <main class="l-main__2colum u-site__width">

  <a class="c-btn" href="{{ url('post-idea/create') }}">アイデアを投稿する</a>

  <section class="p-ideaList">
  <h2 class="c-title__section p-ideaList__title">投稿したアイデア</h2>
  <ul class="c-list p-ideaList__list">
    @foreach($postIdeas as $item)
    <li class="c-list__item p-ideaList__listItem u-clearfix">
      <div class="c-list__link p-ideaList__listLink u-clearfix">
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
              <span>$item->rating</span>
              <span class="p-ideaList__rating--num"></span>
              <span class="c-tag p-ideaList__tag"></span>
            </div>
            <div>
              <a href="{{ url('post-idea/'.$item->id) }}" class="c-btn">詳細を見る<a>
              <a href="{{ url('post-idea/'.$item->id.'/edit') }}" class="c-btn">編集をする<a>
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
</section>
    
  </main>
</div>
@endsection