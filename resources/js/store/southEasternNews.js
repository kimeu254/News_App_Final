import axios from "axios"

export default {
    state: {
        southEasternNews: [],
    },
    getters: {
        southEasternNews(state) {
            return state.southEasternNews.slice().reverse()
        }
    },
    actions: {
        getSouthEasternNews({commit}) {
            return axios.get('/api/southEasternNews').then(({data}) => {
                commit('SET_SOUTHEASTERNNEWS', data)
            });
        },
        newSouthEasternNews({commit}, southEasternNews) {
            return axios.post('/api/southEasternNews').then(res => {
                console.log(res.data)
                commit('NEW_SOUTHEASTERNNEWS', southEasternNews)
            })
        },
        removeSouthEasternNews({commit}, id) {
            return axios.delete('/api/southEasternNews/' + id).then(res => {
                commit('DELETE_SOUTHEASTERNNEWS', id)
            })
        },
        async updateSouthEasternNews({commit}, id, southEasternNews) {
            try {
                let result = await axios.put('/api/SouthEasternNews/'+ id, southEasternNews)
                console.log(result.response.data)
                commit('EDIT_SOUTHEASTERNNEWS', southEasternNews)
            } catch (error) {
                console.error(error.response.data)
            }
        },
    },
    mutations: {
        SET_SOUTHEASTERNNEWS(state, southEasternNews) {
            state.southEasternNews = southEasternNews
        },
        NEW_SOUTHEASTERNNEWS(state, southEasternNews) {
            state.southEasternNews = state.southEasternNews.unshift(southEasternNews)
        },
        DELETE_SOUTHEASTERNNEWS(state, id) {
            state.southEasternNews = state.southEasternNews.filter(s => {
                return s.id !== id
            })
        },
        EDIT_SOUTHEASTERNNEWS(state, southEasternNews) {
            const index = state.southEasternNews.find(s => s.id === southEasternNews.id)
        }
    },
}