<section class="c-section p-pickupCategory">
      <h2 class="c-title__section p-pickupCategory__title">人気のカテゴリ</h2>
      <div class="p-pickupCategory__container">

        @foreach($pickupCategories as $pickupCategory)
        <div class="p-pickupCategory__item">
          <!-- <div class="c-img__filter p-pickupCategory__filter"> -->
            <a href="#" class="p-pickupCategory__link">

              <div class="p-pickupCategory__item--outer c-img--outer">
                <div class="p-pickupCategory__filter">
                  <small class="p-pickupCategory__name">{{ $pickupCategory->category_name }}</small>
                </div>
            
                  <img src="{{ asset('/images/categories/'.$pickupCategory->image) }}" alt="{{ $pickupCategory->name }}.'の写真'" class="c-img p-pickupCategory__img">
              </div>

            </a>
        </div>
        @endforeach

      </div>
    </section>