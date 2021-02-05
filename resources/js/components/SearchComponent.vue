<template>

  <div class="c-search__wrapper p-fullList__search">


        <select name="type" class="c-selectBox" v-model="selectedTypeId" @change="onChangeType">
          <option v-for="type in types" :value="type.id" v-text="type.text" :key="type.id"></option>
        </select>

        <select name="order" class="c-selectBox p-fullList__search--order" v-model="selectedOrderId">
          <option :value="order.id" v-for="order in filteredOrders" :key="order.id" v-text="order.text"></option>
        </select>

        <select name="category_id" v-model="selectedCategoryId" class="c-selectBox p-fulllList__search--category">

          <option :value="category.id" v-for="category in filterCategories" :key="category.id" v-text="category.name_ja"></option>

        </select>

        <button name="submit" type="submit" class="c-search"><i class="fas fa-search"></i></button>
      </div>

</template>

<script>

export default {
  props:['categories','type','order', 'category_id'],
  data: function() {
    return {
      types: [
        { id:-1, text: '検索'},
        { id:1, text: '投稿日'},
        { id:2, text: '価格順'},
      ],
      orders: [

        { typeId: 1, id: 1, text: '投稿が新しい順'},
        { typeId: 1, id: 2, text: '投稿が古い順'},

        { typeId: 2, id: 1, text: '価格が高い順'},
        { typeId: 2, id: 2, text: '価格が安い順'},

      ],

      selectedTypeId:  this.type ? this.type: -1 ,
      selectedOrderId: this.order ? this.order : -1,
      selectedCategoryId: this.category_id ? this.category_id: -1,
    }
  },
  methods: {
        onChangeType() {

          this.selectedOrderId = -1;

          if(!this.selectedTypeId) {
            this.selectedTypeId = -1;
          }
          
        },
        // onSearch(value){
          // // this.url = 'ideas-post/' + this.selectedCategoryId;
          // // this.url.submit;
          // // console.log(value);
          // // var form = document.createElement('form');
          // // var request = document.createElement('input');
      
          // form.method = 'POST';
          // form.action = 'https://ideas-list/' + this.selectedCategoryId;
      
          // request.type = 'hidden'; //入力フォームが表示されないように
          // // request.name = 'text';
          // request.value = value;
      
          // // form.appendChild(request);
          // // document.body.appendChild(form);

          // console.log(form);
      
          // // form.submit();
        // onSearch(){
        //   const url = '/ideas-list/' + this.selectedCategoryId;

        //   axios.post(url)
        //     .then((response) => {
        //       this.items = response.data
        //     })
        // }
        // }
  },
  computed: {

    filteredOrders() {
      let filteredOrders = [ {typeId: -1, id: -1, text: '並び順'}];
      
      for(let i = 0; i < this.orders.length ; i++){
        let order = this.orders[i];
        if(order.typeId == this.selectedTypeId) {
          filteredOrders.push(order);
        }
      }
      return filteredOrders;
    },

    filterCategories() {
      let filterCategories = [{id: -1, name_ja: 'すべて'}];

      for(let i = 0; i < this.categories.length ; i++){
        let category = this.categories[i];
          filterCategories.push(category);
      }
        return filterCategories;
    }
  },
  mounted(){
    console.log(this.type);
  }
}

</script>