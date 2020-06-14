import Vue from 'vue';
import VueRouter from 'vue-router';

import {
    Dashboard,
    Users,
    UserForm,
    Country,
    CountryForm
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
    },
    {
        path: '/users/create',
        component: UserForm,
        name: 'UserForm',
        mode: 'create'
    },
    {
        path: '/country',
        component: Country,
        name: 'Country'
    },
    {
        path: '/country/create',
        component: CountryForm,
        name: 'CountryForm',
        mode: 'create'
    },
    {
        path: '/country/:id/edit',
        component: CountryForm,
        name: 'CountryForm',
        meta: {
            mode: 'edit'
        }
    }
]

export const router = new VueRouter({
    mode: 'history',
    base: '/cp',
    routes,
    linkExactActiveClass: 'active'
})
