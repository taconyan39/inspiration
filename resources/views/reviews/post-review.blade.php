@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">
        
        <main class="c-form__wrapper p-ideaPost ">
        <div class="p-ideaPost__title c-form__header">
            <h2 class="c-form__title">アイデア投稿画面</h2>
        </div>
        
        <form method="POST" action="{{ url('reviews/post-review/' . $idea->id) }}" class="c-form p-ideaPost__form u-clearfix">
            @csrf
            
            <label for="rating" class="p-ideaPost__label c-form__label">
                {{ __('Category')}}
            </label>

            <select id="rating" class="p-ideaPost__select c-form__input
            @error('rating') is-invalid @enderror"
            name="rating"
            value="{{ old('rating') }}" autocomplete="rating"
            autofocus>
                <option value="0">選択してください</option>
              @for($i = 1; $i <= 5 ;$i++)
                  <option value="{{ $i }}" class="category__type">{{ $i }}</option>
              @endfor
            </select>
              
            @error('rating')
              <span class="c-error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

                <label for="review" class="p-ideaPost__label c-form__label">
                    {{ __('Summary') }}
                </label>
                    
                        <input id="review" type="review" class="p-ideaPost__input
                        c-form__input @error('review') is-invalid @enderror" name="review" required autocomplete="review">
                        
                    @error('review')
                    <span class="c-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                
            <button type="submit" class="
            c-btn c-form__btn btn p-ideaPost__btn">
                {{ __('Post Idea') }}
            </button>
        </form>
    </main>
    <div class="c-link__conainer">
    </div>
    @include('components.sidebar-profile',['user' => $user])
        <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
</div>
@endsection
