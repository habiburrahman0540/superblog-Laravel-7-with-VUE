require('./bootstrap');
window.Vue = require('vue');
//Vuex support
import Vuex from 'vuex'
Vue.use(Vuex)
//ckeditor
import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );
//Vue Router
import VueRouter from 'vue-router'
import {routes} from './routes';
//moment for date format
import {filter} from './filters';
Vue.use(VueRouter)

Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('public-main', require('./components/public/PublicMaster').default);

Vue.component('examplecom', require('./components/ExampleComponent.vue').default);
window.Form = Form;
import { Form, HasError, AlertError } from 'vform'
import Swal from 'sweetalert2'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Swal = Swal;
window.Toast = Toast;
const router = new VueRouter({
    routes ,
    mode: 'hash',
  })
  import storeData from "./store/index.js"
  const store = new Vuex.Store(
    storeData
  )

const app = new Vue({
    el: '#app',
    router,
    store,
    
    
});