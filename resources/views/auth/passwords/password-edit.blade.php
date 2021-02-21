@extends('layouts.app')

@section('title', '会員登録')

@section('content')

<div class="l-wrapper__1colum u-site__width">
    <div class="c-form__wrapper p-passwordEdit">
        <div class="p-passwordEdit__title c-form__header">
            <h2 class="c-form__title">{{ __('Register') }}</h2>
        </div>

        <form method="POST" action="{{ route('passwordEdit.update') }}" class="c-form p-passwordEdit__form u-clearfix">
        @csrf

            <label for="current_password" class="p-passwordEdit__label c-form__label">現在のパスワード

                <input id="current_password" type="password" class="p-passwordEdit__current c-form__input @error('current_password') is-invalid @enderror" name="current_password" value="">
            </label>

            @error('current_password')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password" class="p-passwordEdit__label c-form__label">新しいパスワード

                <input id="password" type="password" class="p-passwordEdit__pass c-form__input @error('password') is-invalid @enderror" name="password">
            </label>

            @error('password')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm" class="p-passwordEdit__label c-form__label">{{ __('Confirm Password') }}

                
                <input id="password-confirm" type="password" class="p-passwordEdit__passConfirm c-form__input" name="password_confirmation">
            </label>

            <div class="c-btn__wrapper p-passwordEdit__btnBox c-flex--end">
                <button type="submit" class="c-btn c-btn--action2 c-form__btn p-passwordEdit__btn">
                    {{ __('Edit') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
