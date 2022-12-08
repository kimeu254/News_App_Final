import axios from "axios"

export default {
    state: {
        nationalNews: [],
    },
    getters: {
        nationalNews(state) {
            return state.nationalNews.slice().reverse()
        }
    },
    actions: {
        getnationalNews({commit}) {
            return axios.get('/api/nationalNews').then(({data}) => {
                commit('SET_NATIONAL_NEWS', data)
            });
        },
        newnationalNews({commit}, nationalNews) {
            return axios.post('/api/nationalNews').then(res => {
                console.log(res.data)
                commit('NEW_NATIONAL_NEWS', nationalNews)
            })
        },
        removenationalNews({commit}, id) {
            return axios.delete('/api/nationalNews/' + id).then(res => {
                commit('DELETE_NATIONAL_NEWS', id)
            })
        },
        async updatenationalNews({commit}, id, nationalNews) {
            try {
                let result = await axios.put('/api/nationalNews/'+ id, nationalNews)
                console.log(result.response.data)
                commit('EDIT_NATIONAL_NEWS', nationalNews)
            } catch (error) {
                console.error(error.response.data)
            }
        },
    },
    mutations: {
        SET_NATIONAL_NEWS(state, nationalNews) {
            state.nationalNews = nationalNews
        },
        NEW_NATIONAL_NEWS(state, nationalNews) {
            state.nationalNews = state.nationalNews.unshift(nationalNews)
        },
        DELETE_NATIONAL_NEWS(state, id) {
            state.nationalNews = state.nationalNews.filter(s => {
                return s.id !== id
            })
        },
        EDIT_NATIONAL_NEWS(state, nationalNews) {
            const index = state.nationalNews.find(s => s.id === nationalNews.id)
        }
    },
}