        <main class="c-form__wrapper p-ideaPost ">
        <div class="p-ideaPost__title c-form__header">
            <h2 class="c-form__title">アイデア投稿画面</h2>
        </div>
        
        <form method="POST" action="{{ url('post-idea') }}" class="c-form p-ideaPost__form u-clearfix">
          @csrf
            
            <label for="category_id" class="p-ideaPost__label c-form__label">
                {{ __('Category')}}
            </label>

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
              
            @error('category_id')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <label for="title" class="p-ideaPost__label c-form__label">
              {{ __('Idea Name')}}
            </label>

              <input id="title" type="text" class="p-ideaPost__input c-form__input
                                @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                
                                @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                <label for="summary" class="p-ideaPost__label c-form__label">
                    {{ __('Summary') }}
                </label>
                    
                        <input id="summary" type="summary" class="p-ideaPost__input
                        c-form__input @error('summary') is-invalid @enderror" name="summary" required autocomplete="summary">
                        
                    @error('summary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <label for="price" class="p-ideaPost__label c-form__label">
                    {{ __('Price') }}
                </label>
                    
                        <input id="price" type="price" class="p-ideaPost__price
                        c-form__input @error('price') is-invalid @enderror" name="price" required autocomplete="price">
                        
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <label for="content" class="p-ideaPost__label c-form__label">
                    {{ __('Idea Content') }}
                </label>
                    
                        <textarea id="content" class="p-ideaPost__textArea
                        c-form__textArea @error('content') is-invalid @enderror" name="content" required autocomplete="content">
                            アイデアの内容を入力してください(5000文字以内)
                        </textarea>
                        
                    @error('content')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        
                    <div class="p-ideaPost__label--wrapper">
                    
                    <label for="upload_img">
                    </label>
            

            {{ $btn }}
        </form>
    </main>
    <div class="c-link__conainer">
    </div>