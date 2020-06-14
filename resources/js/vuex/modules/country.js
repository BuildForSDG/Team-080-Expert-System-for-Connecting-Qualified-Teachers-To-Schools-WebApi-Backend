const state = {
    model: {data: []}
}

const mutations = {
    RECIEVE_COUNTRY(state,payload) {
        state.model = payload
    }
}

export default {
    state,
    mutations
}
