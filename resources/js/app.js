// require('./bootstrap');
import Vue from 'vue';

var exampleComponent = {
  template:
    `<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>`
}

// Vue.component('example-component', {
//   template:
//     `<div class="container">
//         <div class="row justify-content-center">
//             <div class="col-md-8">
//                 <div class="card">
//                     <div class="card-header">Example Component</div>

//                     <div class="card-body">
//                         I'm an example component.
//                     </div>
//                 </div>
//             </div>
//         </div>
//     </div>`
// })

new Vue({
  el: '#app',
  components: {
    'example-component': exampleComponent
  },
})