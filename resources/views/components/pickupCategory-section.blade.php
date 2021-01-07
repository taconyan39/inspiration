<section class="c-content p-pickupCategory">
      <h2 class="c-title__section p-pickupCategory__title">人気のカテゴリ</h2>
      <div class="p-pickupCategory__container">

        @foreach($pickupCategories as $pickupCategory)
            <div class="p-pickupCategory__item">
              <a href="#" class="p-pickupCategory__link">
                <span class="p-pickupCategory__name">{{ $pickupCategory->name }}</span>
                <div class="p-pickupCategory__item--outer c-img--outer">
                  <img src="{{ asset('/images/categories/'.$pickupCategory->image) }}" alt="{{ $pickupCategory->name }}.'の写真'" class="c-img p-pickupCategory__img">
                </div>
                <!-- <div class="c-img__filter"></div> -->
              </a>
            </div>
        @endforeach

      </div>
    </section>