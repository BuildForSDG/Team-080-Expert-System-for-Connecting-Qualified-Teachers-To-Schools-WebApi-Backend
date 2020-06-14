import Vue from 'vue'
import Vuex from 'vuex';

import * as actions from './actions';
import * as getters from './getters';
import users from './modules/users';
import title from './modules/title';
import country from './modules/country';

Vue.use(Vuex)

export const store = new Vuex.Store({
    actions,
    getters,
    modules: {
        users,
        title,
        country
    }
})
