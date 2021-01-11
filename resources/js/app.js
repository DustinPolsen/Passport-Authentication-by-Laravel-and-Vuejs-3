require('./bootstrap');

// Vue js implementation
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import { createStore } from 'vuex';
import App from './App.vue';
// Router
import { routes } from './back-end/routers/routes';
import storage from './back-end/store/storage';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to) => {
  const isLoggedIn = store.state.auth.isLoggedIn;
  if (to.meta.requireAuth && !isLoggedIn) {
    return {
      path: "/login",
      query: { redirect: to.fullPath }
    }
  }
  else if (to.meta.requireAuth === false && isLoggedIn === true) {
    return {
      path: "/dashboard",
    }
  }
  else {
    return true;
  }
});

const store = createStore(storage);
const app = createApp(App);
app .use(router);
app.use(store);
app.mount('#app');
// Templates assets
// Jquery
let jQuery = require('jquery');
window.$ = window.jQuery = jQuery;
require('bootstrap');
require('admin-lte/dist/js/adminlte.min.js');

// Toastr Alert Setup (https://codeseven.github.io/toastr/demo.html)
window.toastr = require('toastr');
window.toastr.options = {
  "closeButton": true,
  "debug": true,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "500",
  "hideDuration": "2000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

// Set up the Sweet Alert-2 (https://sweetalert2.github.io/)
window.Swal = require('sweetalert2');
