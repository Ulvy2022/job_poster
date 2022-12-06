import { createRouter, createWebHistory } from 'vue-router';
import LoginForm from '../views/login/LoginView.vue';
import RegisterGoogle from '../views/register/RegisterView.vue';



const routes = [
  {
    path: '/login',
    name: 'login',
    component: LoginForm,
  },

  {
    path: '/register',
    name: 'register',
    component: RegisterGoogle,
  },

   {
    path: '/purchase',
    name: 'purchase',
    component: () => import('@/views/cardPayment/cardPayment.vue'),
  },

  {
    path: '/post',
    name: 'post',
    component: () => import('@/components/postJob/PostForm.vue'),
    beforeEnter() {
      const userId = localStorage.getItem('userId');
      if (userId == null) {
        return { name: 'notFound' };
      }
    }
  },

  {
    path: '/',
    name: 'home',
    component: () => import('@/views/Home/HomePage.vue'),
  },

  {
    path: '/job_detail/:id',
    name: 'job_detail',
    component: () => import('@/views/jobView/jobView.vue'),
  },
  
  {
    path: '/resetPsw',
    name: 'resetPsw',
    component: () => import('@/views/resetPassword/resetPswView.vue'),
  },
  {
    path: '/job_category',
    name: 'job_category',
    component: () => import('@/views/jobCategory/jobCategoryView.vue'),
  },
  {
    path: '/profile',
    name: 'profile',
    component: () => import('@/views/userProfile/userProfileView.vue'),
    beforeEnter() {
      const userId = localStorage.getItem('userId');
      if (userId == null) {
        return { name: 'notFound' };
      }
    }
  },
  {
    path: '/setting',
    name: 'setting',
    component: () => import('@/views/settingView/settingView.vue'),
    beforeEnter() {
      const userId = localStorage.getItem('userId');
      if (userId == null) {
        return { name: 'notFound' };
      }
    }
  },
  {
    path: '/subscribe',
    name: 'subscribe',
    component: () => import('@/views/plane/planeView.vue'),
  },
  {
    path: '/payment/:id',
    name: 'payment',
    component: () => import('@/views/cardPayment/cardPayment.vue'),
    beforeEnter() {
      const userId = localStorage.getItem('userId');
      if (userId == null) {
        return { name: 'notFound' };
      }
    }
  },

  {
    path: '/successpay',
    name: '/successpay',
    component: () => import('@/views/successPayView/successPayView.vue'),
    beforeEnter() {
      const userId = localStorage.getItem('userId');
      if (userId == null) {
        return { name: 'notFound' };
      }
    }
  },
  
  {
    path: '/changePassword',
    name: 'changePassword',
    component: () => import('@/views/updatePassword/updatePassword.vue'),
  },

  {
    path: '/userList',
    name: 'userList',
    component: () => import('@/views/userList/userListView.vue'),
    beforeEnter() {
      const admine = localStorage.getItem('role');
      if (admine != 'Admine') {
        return { name: 'notFound' };
      }
    }
  },
  {
    path: '/userDetail/:id',
    name: 'userDetail',
    component: () => import('@/views/userPost/userPostView.vue'),
    beforeEnter() {
      const admine = localStorage.getItem('role');
      if (admine != 'Admine') {
        return { name: 'notFound' };
      }
    }
},
  {
    path: '/notFound',
    name: 'notFound',
    component: () => import('@/views/notFoundPage/notFoundPage.vue'),
  },
]; 

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

// router.beforeEach(store);

export default router;
