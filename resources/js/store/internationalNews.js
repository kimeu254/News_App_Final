import axios from "axios"

export default {
    state: {
        internationalNews: [],
    },
    getters: {
        internationalNews(state) {
            return state.internationalNews.slice().reverse()
        }
    },
    actions: {
        getinternationalNews({commit}) {
            return axios.get('/api/internationalNews').then(({data}) => {
                commit('SET_INTERNATIONAL_NEWS', data)
            });
        },
        newinternationalNews({commit}, internationalNews) {
            return axios.post('/api/internationalNews').then(res => {
                console.log(res.data)
                commit('NEW_INTERNATIONAL_NEWS', internationalNews)
            })
        },
        removeinternationalNews({commit}, id) {
            return axios.delete('/api/internationalNews/' + id).then(res => {
                commit('DELETE_INTERNATIONAL_NEWS', id)
            })
        },
        async updateinternationalNews({commit}, id, internationalNews) {
            try {
                let result = await axios.put('/api/internationalNews/'+ id, internationalNews)
                console.log(result.response.data)
                commit('EDIT_INTERNATIONAL_NEWS', internationalNews)
            } catch (error) {
                console.error(error.response.data)
            }
        },
    },
    mutations: {
        SET_INTERNATIONAL_NEWS(state, internationalNews) {
            state.internationalNews = internationalNews
        },
        NEW_INTERNATIONAL_NEWS(state, internationalNews) {
            state.internationalNews = state.internationalNews.unshift(internationalNews)
        },
        DELETE_INTERNATIONAL_NEWS(state, id) {
            state.internationalNews = state.internationalNews.filter(s => {
                return s.id !== id
            })
        },
        EDIT_INTERNATIONAL_NEWS(state, internationalNews) {
            const index = state.internationalNews.find(s => s.id === internationalNews.id)
        }
    },
}