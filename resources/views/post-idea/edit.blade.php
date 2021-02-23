@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">

@include('components.sidebar-profile',
    ['user' => $user])

<main class="l-main__2colum ">
        <div class="p-ideaPost__title">
            <h2 class="c-title__content">アイデア編集画面</h2>
        </div>

        <form action="{{url('post-idea/'.$idea->id) }}" method="POST">
        @csrf
            <input type="hidden" name="_method" value="DELETE">
            <!-- <input type="submit" value="削除" class="c-btn"> -->

            <idea-edit-form :idea="{{ $idea }}"     :categories="{{$categories}}"     delete="{{ url('delete')}}"
              mypage="{{ url('mypage')}}"
              edit="{{ url('edit' . $idea->id)}}"
        ></idea-edit-form>
        </form>

        
        
    </main>
        

            <div class="c-link__conainer">
    </div>

    
        <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
</div>
@endsection
