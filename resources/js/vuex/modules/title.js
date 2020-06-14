const state = {
    data: ''
}

const mutations = {
    RECIEVE_TITLE(state, payload) {
        state.data = payload
    }
}

export default {
    state,
    mutations
}
