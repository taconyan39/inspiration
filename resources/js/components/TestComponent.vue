<template>


<div id="app">
 <input v-model.trim="titleCount" maxlength="20" placeholder="入力してください">
 <p>{{ text.length }}/20</p>
 <p>最大文字数20文字</p>

<script>
export default {

 data() { 
     return{
        text: "",
     }
 }
}

</script>