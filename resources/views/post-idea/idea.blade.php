@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">
        @include('components.sidebar-profile')
    
    <main class="l-main__2colum">
        @auth
            @include('components.article', ['idea' => $idea])
            
            <section class="p-ideaDetail__review">

                @if( $myreview )
                    <p class="p-ideaDetail__reviewText">あなたの口コミ</p>
                    <div>{{ $myreview->review }}</div>
                @else
                    <p class="p-ideaDetail__reviewText">レビューを書いて投稿しよう！！</p>
                    <form action="{{ url('post-idea/post-review/' . $idea->id)}}" method="POST">
                    @csrf
                    <post-review></post-review>
                    </form>
                @endif
            </section>
        @endauth

        @guest
            @include('components.article', ['idea' => $idea])

        @endguest

        <idea-reviews img="{{ asset('storage/images/icons') }}" :id="{{$idea->id}}"></idea-reviews>
        
        <div class="c-link__container">
            <a href="{{url()->previous()}}" class="c-link__underline">&lt;&lt; 前のページに戻る</a>
        </div>
    </main>
</div>
@endsection
