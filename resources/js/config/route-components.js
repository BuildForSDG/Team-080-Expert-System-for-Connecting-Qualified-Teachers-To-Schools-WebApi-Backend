import Vue from 'vue';

export const Dashboard = Vue.component(
    'Dashboard',
    require('_/Dashboard/index.vue')
);

export const Users = Vue.component(
    'Users',
    require('_/Users/index.vue')
);

export const UserForm = Vue.component(
    'UserForm',
    require('_/Users/form.vue')
);

export const Country = Vue.component(
    'Country',
    require('_/Country/index.vue')
 )

export const CountryForm = Vue.component(
    'CountryForm',
    require('_/Country/form.vue')
);
