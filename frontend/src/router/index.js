import { createRouter, createWebHistory } from 'vue-router';
import LoginForm from '../views/login/LoginView.vue';

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginForm,
  },

  {
    path: '/post',
    name: 'post',
    component: () => import('@/components/postJob/PostForm.vue'),
  },

  {
    path: '/home',
    name: 'home',
    component: () => import('@/views/Home/HomePage.vue'),
    meta: {
        requiresAuth:true,
    }
  },
  {
    path: '/job_detail',
    name: 'job_detail',
    component: () => import('@/views/jobView/jobView.vue'),
    meta: {
        requiresAuth:true,
    }
  },
  {
    path: '/resetPsw',
    name: 'resetPsw',
    component: () => import('@/views/resetPassword/resetPswView.vue'),
    meta: {
        requiresAuth:true,
    }
  },
  {
    path: '/job_category',
    name: 'job_category',
    component: () => import('@/views/jobCategory/jobCategoryView.vue'),
    meta: {
        requiresAuth:true,
    }
  },
  {
    path: '/profile',
    name: 'profile',
    component: () => import('@/views/userProfile/userProfileView.vue'),
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
