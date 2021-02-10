@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">

@include('components.sidebar-profile',['user' => $user])
        
        <main class="c-form__wrapper p-ideaPost ">
        <div class="p-ideaPost__title c-form__header">
            <h2 class="c-form__title">アイデア投稿画面</h2>
        </div>
        
        <form method="POST" action="{{ url('post-idea') }}" class="c-form p-ideaPost__form u-clearfix">
            @csrf
            
            <label for="category_id" class="p-ideaPost__label c-form__label">
                カテゴリー
            </label>

            <select id="category_id" class="p-ideaPost__select c-form__input
            @error('category_id') is-invalid @enderror"
            name="category_id"
            value="{{ old('category_id') }}" required autocomplete="category_id"
            autofocus>
                <option>選択してください</option>
              @foreach($categories as $category)
                  <option value="{{ $category->id }}" class="category__type">{{ __($category->name_ja) }}</option>
              @endforeach
            </select>
              
            @error('category_id')
              <span class="c-error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <label for="title" class="p-ideaPost__label c-form__label">
                アイデア名
            </label>

              <input id="title" type="text" class="p-ideaPost__input c-form__input
                                @error('title') is-invalid @enderror" 
                                name="title" autocomplete="title" autofocus>
                                
                                @error('title')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                <label for="summary" class="p-ideaPost__label c-form__label">
                    概要
                </label>
                    
                        <input id="summary" type="summary" class="p-ideaPost__input
                        c-form__input @error('summary') is-invalid @enderror" name="summary" autocomplete="summary"
                        value="{{ old('summary') }}">
                        
                    @error('summary')
                    <span class="c-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <label for="price" class="p-ideaPost__label c-form__label">
                    価格
                </label>
                    
                        <input id="price"
                         type="price"
                         class="p-ideaPost__price
                        c-form__input @error('price') is-invalid @enderror" 
                        name="price"
                        value="{{ old('price') }}" autocomplete="price">
                        
                    @error('price')
                    <span class="c-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <label for="content" class="p-ideaPost__label c-form__label">
                    アイデアの詳細
                </label>
                    
                        <textarea id="content" class="p-ideaPost__textarea
                        c-form__textarea @error('content') is-invalid @enderror" name="content" autocomplete="content">{{ old('アイデアの内容を入力してください(5000文字以内)') }}</textarea>
                        
                    @error('content')
                    <span class="c-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        
                    <div class="p-ideaPost__label--wrapper">
                    
                    <label for="upload_img">
                    </label>

            <button type="submit" class="
            c-btn c-form__btn btn p-ideaPost__btn">
                    投稿する
            </button>
        </form>
        <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
    </main>
</div>
@endsection
