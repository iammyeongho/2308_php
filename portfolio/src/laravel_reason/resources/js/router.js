import { createWebHistory, createRouter } from 'vue-router';
import MainComponent from '../components/MainComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import VueCookies from 'vue-cookies';
import store from './store';

const routes = [
    {
        path: '/',
        redirect: '/main',
    },
    {
        path: '/main',
        component: MainComponent,
    },
    {
        path: '/registration',
        component: RegistrationComponent,
    },
    {
        path: '/login',
        component: LoginComponent,
        beforeEnter: (to, from, next) => {
            const rememberToken = VueCookies.get('remember_token');
            if (rememberToken) {
                // 이미 로그인된 경우 로그인 페이지로 이동 방지
                next('/');
            } else {
                next();
            }
        },
    },
    {
        path: '/logout',
        component: MainComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;