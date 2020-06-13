export const getAllUsers = ({commit}, payload) => {
    return new Promise((resolve, reject) => {
        axios.get('/json/v1/users',
            {params: {
                page: payload.page,
                per_page: payload.per_page
            }}).then(res => {
            commit('RECIEVE_ALL_USERS', res.data)
            resolve()
        }).catch(err => {
            reject(err)
        })
    })
}
