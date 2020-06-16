const state = {
    data: {}
}

const mutations = {
    RECIEVE_PROFILE(state, payload) {
        state.data = payload
    }
}

export default {
    state,
    mutations
}
