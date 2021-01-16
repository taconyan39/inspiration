@extends('layouts.app')

@section('title', 'アイデア投稿')

@section('content')
<div class="l-wrapper__2colum u-site__width">

<main class="c-form__wrapper p-ideaPost ">
        <div class="p-ideaPost__title c-form__header">
            <h2 class="c-form__title">アイデア投稿画面</h2>
        </div>
        
        <form method="POST" action="{{ url('post-idea/'.$idea->id) }}" class="c-form p-ideaPost__form u-clearfix">
          @csrf
            
            <label for="category_id" class="p-ideaPost__label c-form__label">
                {{ __('Category')}}
                
                <select id="category_id" class="p-ideaPost__select c-form__input
                @error('category_id') is-invalid @enderror"
                name="category_id"
                value="{{ old('category_id') }}" required autocomplete="category_id"
                autofocus>
                <option value="0">選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" class="category__type">{{ __($category->name) }}</option>
                @endforeach
                </select>
            </label>
            
            @error('category_id')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <label for="title" class="p-ideaPost__label c-form__label">
              {{ __('Idea Name')}}
              
              <input id="title" type="text" class="p-ideaPost__input c-form__input
              @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
            </label>
              
              @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                <label for="summary" class="p-ideaPost__label c-form__label">
                    {{ __('Summary') }}
                    
                    <input id="summary" type="summary" class="p-ideaPost__input
                    c-form__input @error('summary') is-invalid @enderror" name="summary" required autocomplete="summary">
                </label>
                    
                    @error('summary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <label for="price" class="p-ideaPost__label c-form__label">
                    {{ __('Price') }}
                    
                    <input id="price" type="price" class="p-ideaPost__price
                    c-form__input @error('price') is-invalid @enderror" name="price" required autocomplete="price">
                </label>
                        
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <label for="content" class="p-ideaPost__label c-form__label">
                    {{ __('Idea Content') }}
                    
                    <textarea id="content" class="p-ideaPost__textArea
                    c-form__textArea @error('content') is-invalid @enderror" name="content" required autocomplete="content">
                    アイデアの内容を入力してください(5000文字以内)
                </textarea>
            </label>
                        
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        
                    <div class="p-ideaPost__label--wrapper">
                    
                    <label for="upload_img">
                    </label>
            

                    <input type="hidden" name="_method" value="PUT">
                <input type="submit" value="編集する">
        </form>
    </main>
        

            <div class="c-link__conainer">
    </div>
    @include('components.sidebar-profile',
    ['user' => $user])

    <form action="{{url('post-idea/'.$idea->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="削除" class="c-btn">
    </form>
        <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
</div>
@endsection
