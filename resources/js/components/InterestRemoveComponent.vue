<template>

  <div>
    <button @click="onChangeInterest(item.flg)">☆ 気になる</button>
  </div>
</template>

<script>
export default {
  props:{
    idea: {
      type: Number,
    },
  },
    data() {
            return {
              item: [],
            }
          },
  methods: {

    onChangeInterest(interestFlg){
      const url = '/ajax/interest/' + this.idea.id

      const params = { flg: !interestFlg};

      axios.post(url, params)
        .then(response => {
            this.item = response.data;
        });
        
    },
  },
  mounted(){

    const url = '/ajax/interest/' + this.idea.id

      axios.get(url)
        .then((response) => {
          this.item= response.data;
        })
  }

}
</script>