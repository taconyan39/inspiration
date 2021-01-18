<template>
  
<form method="POST" action="{{ route('profile.update') }}" class="c-form p-profEdit__form u-clearfix" enctype="multipart/form-data">
            @csrf
            
            <label for="name" class="p-profEdit__label c-form__label">
              {{ __('Name') }}

                <input id="name" type="name" class="p-profEdit__name c-form__input
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


            <!-- 変更テストが必要 -->
            <label for="email" class="p-profEdit__label c-form__label">
              {{ __('E-Mail Address')}}
              
              <input id="email"
                     type="email" 
                     class="p-profEdit__email c-form__input
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

            <label for="password" class="p-profEdit__label c-form__label">
                {{ __('Password') }}
                
                <input id="password" 
                       type="password" 
                       class="p-profEdit__pass c-form__input @error('password') is-invalid @enderror" 
                       name="pass_old" 
                       autocomplete="current-password">
            </label>
                    
                @error('password')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            <label for="pass_new" class="p-profEdit__label c-form__label">
                {{ __('New Password') }}
                
                <input id="password" 
                       type="pass_new" 
                       class="p-profEdit__pass c-form__input @error('pass_new') is-invalid @enderror" 
                       name="pass_new" 
                       autocomplete="current-pass_new">
            </label>
                    
                @error('pass_new')
                <span class="c-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @if('password_match')
                    <span class="c-error">パスワードが違います</span>
                @endif
            <label for="pass_re" class="p-profEdit__label c-form__label">
                {{ __('Password Confirm') }}
                
                <input id="pass_re" 
                       type="pass_re" 
                       class="p-profEdit__pass c-form__input @error('pass_re') is-invalid @enderror" 
                       name="pass_re" 
                       autocomplete="current-pass_re">
            </label>
                    
            @error('pass_re')
            <span class="c-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
                
            <div class="p-profEdit__label--wrapper">
            
            <label for="icon_img">
            </label>
            <input type="file" 
                    name="icon_img" 
                    id="icon_img" 
                    autocomplete="icon_img" 
                    value="{{ old('prof_img') }}">
            @error('prof_img')
                <span class="c-error" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="
            c-btn c-form__btn btn p-profEdit__btn">
                {{ __('Edit') }}
            </button>
        </form>

</template>