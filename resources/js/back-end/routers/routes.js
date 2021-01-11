import Login from '../../auth/Login.vue';
import Registration from '../../auth/Registration.vue';
import Dashboard from '../components/Dashboard.vue';
import Footer from '../components/Settings/Footer.vue';
import Header from '../components/Settings/Header.vue';


/* Component Setup */
export const routes = [
  /* Authentication */
  {
    path: '/login',
    name : "login",
    component: Login,
    meta : {requireAuth : false}
  },
  {
    path: '/register',
    name : 'register',
    component: Registration,
    meta : {requireAuth : false}
  },
  /* dashboard componet */
  {
    path: '/dashboard',
    name : 'dashboard',
    component: Dashboard, 
    meta : {requireAuth : true}
  },
 /* Settings Component */
  {
    path: '/header',
    name : 'header',
    component: Header, 
    meta : {requireAuth : true}
  },
  {
    path: '/footer',
    name : "footer",
    component: Footer,
    meta : {requireAuth : true}
  },
];