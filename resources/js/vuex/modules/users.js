const state = {
    model: {data: []}
}

const mutations = {
    RECIEVE_ALL_USERS(state, payload) {
        state.model = payload
    }
}
export default {
    state,
    mutations
}
