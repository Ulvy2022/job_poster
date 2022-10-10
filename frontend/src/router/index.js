import { createRouter, createWebHistory } from 'vue-router';
import LoginForm from '../views/login/LoginView.vue';

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginForm,
  },
  {
    path: '/home',
    name: 'home',
    component: () => import('@/views/AboutView.vue'),
    meta: {
        requiresAuth:true,
    }
  }
]; 


// function authenticationGuard(to, from, next) {
//   let requiresAuth = to.meta.requiresAuth;
//   if (requiresAuth) {
//       if(!localStorage.getItem('token')){
//         next('/login');
//       }
//       else {
//         next();
//       }
//   }
// }

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

// router.beforeEach(authenticationGuard);

export default router;
