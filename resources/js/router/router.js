import Vue from 'vue';
import VueRouter from 'vue-router';

import {
    Dashboard,
    Users
} from '../config/route-components';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: Dashboard
    },
    {
        path: '/users',
        component: Users,
        name: 'Users'
    }
]

export const router = new VueRouter({
    mode: 'history',
    base: '/cp',
    routes,
    linkExactActiveClass: 'active'
})
