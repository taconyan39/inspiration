<template>
<section>
  <input v-model="name"><br>
  <button v-on:click="createNewUser">作成</button>
  <ul>
    <li v-for="user in users" :key="user.id">{{ user.name }}</li>
  </ul>
    </section>

</template>
<script>
// console.log($params)
export default {

 data() { 
     return{
        users: [],
    name: ''
  }
 },
  methods : {
    createNewUser: function(){
     axios.post('http://localhost:8000/test',{
            name: this.name
           })
          .then(response => this.users.unshift(response.data))
          .catch(error => console.log(error))     
    }
  },
  mounted :function(){
    axios.get('https://jsonplaceholder.typicode.com/users')
          .then(response => this.users = response.data)
          .catch(error => console.log(error))
  }
}

    
</script>