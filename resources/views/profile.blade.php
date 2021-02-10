@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
<div class="l-wrapper__2colum u-site__width">
  
    @include('components.sidebar-profile',['user' => $user])

    <main class="c-form__wrapper p-profileEdit ">
        <div class="p-profileEdit__title c-form__header">
            <h2 class="c-form__title">プロフィール編集</h2>
        </div>
        
        <form method="POST" action="{{ route('profile.update') }}" class="c-form p-profileEdit__form u-clearfix" enctype="multipart/form-data">
            @csrf

            <div class="p-profileEdit__row">
            
                <label for="name" class="p-profileEdit__label c-form__label">
                {{ __('Name') }}

                    <input id="name" type="name" class="p-profileEdit__name c-form__input
                    @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name', $user->name) }}" required autocomplete="name"
                    autofocus>
                </label>
                
                @error('name')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <!-- 変更テストが必要 -->
            <div class="p-profileEdit__row">

                <label for="email" class="p-profileEdit__ c-form__label">
                    {{ __('E-Mail Address')}}
                    
                    <input id="email"
                    type="email" 
                    class="p-profileEdit__email c-form__input
                    @error('email') is-invalid @enderror" 
                    name="email" 
                    value="{{ old('email', $user->email) }}" 
                    required autocomplete="email" 
                    autofocus>
                    
                    @error('email')
                    <span class="c-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
            </div>

            <div class="p-profileEdit__row--password">
                <a href="{{ route('passwordEdit.edit') }}" class="c-link__underline p-profileEdit__password">パスワードを変更する</a>
            </div>

            <div class="p-profileEdit__row c-container__row">

                <icon-edit
                    noimage="{{ asset('images/icon/noimage_icon.png') }}"
                    icon="{{ asset('images/icons/' . $user->icon_img) }}"
                ></icon-edit>
                
                @error('prof_img')
                    <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="p-profileEdit__btn--container c-container--half">
                    <button type="submit" class="
                    c-btn p-profileEdit__btn">
                        {{ __('Edit') }}
                    </button>
                </div>
            </div>
        </form>
        <a href="{{url()->previous()}}">&lt;&lt; 前のページに戻る</a>
    </main>
</div>



@endsection
