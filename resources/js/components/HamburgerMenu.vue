<template>
  <!-- <div class="p-header__search js-search"> -->
  <div>
    <div class="hamburger-menu" @click="menu=!menu">
        <div class="hamburger-menu-line line-top"></div>
        <div class="hamburger-menu-line line-middle"></div> 
        <div class="hamburger-menu-line line-bottom"></div>
    </div>

  </div>
</template>

<script>
export default {
  data() { 
     return{
      menu: true
  }
 },
  methods :{
      // menuOn:  {
      //   menu = !menu
      // },
    },
  mounted :function(){
    // axios.get('https://jsonplaceholder.typicode.com/users')
    //       .then(response => this.users = response.data)
    //       .catch(error => console.log(error))
  }
}
</script>
