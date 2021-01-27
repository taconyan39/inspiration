<template>

  <div>
    <button v-if="this.interest" @click="onChangeInterest">★ 解除する</button>
    <button v-else @click="onChangeInterest">☆ 気になる</button>

  </div>
</template>

<script>
export default {
  // props: {
  //   data() {

  //   }
  // },
  props:{
    idea: {
      // type: Number,
    },
    interest: {

    },
    data() {
            return {
              items: [],
              flg: ''
            }
          },

  },
  methods: {
    // Ajaxでデータの取得
    // getItems(){

    //   console.log(this.$emit);
    //   const url = '/ajax/post-idea/' + this.idea.id;
    //   axios.get(url)
    //     .then((response) => {

    //       console.log('response' + response.data);
    //       this.idea = response.data;

    //     });
    // },
    onChangeInterest(){
      // console.log(interest);
      const url = '/ajax/interest/' + this.idea.id
      let data = {
        interest: !this.interest
      }

      // let interest = !this.interest
      
      console.log(this.interest);
      axios.post(url, data)
        .then()
        
    },
    getItems(){

      const url = '/ajax/interest/' + this.idea.id

      axios.get(url)
        .then((response) => {
          this.items = response.data;
        })
        console.log(this.data.items)
    }
  },
  mounted(){
    // console.log(this.idea.id);
    this.getItems();
  }

}
</script>