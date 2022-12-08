import axios from "axios"

export default {
    state: {
        news: [],
    },
    getters: {
        news(state) {
            return state.news.slice().reverse()
        }
    },
    actions: {
        getnews({commit}) {
            return axios.get('/api/news').then(({data}) => {
                commit('SET_NEWS', data)
            });
        },
    },
    mutations: {
        SET_NEWS(state, news) {
            state.news = news
        },
    },
}