import axios from "axios"

export default {
    state: {
        news: [],
        allUsers: [],
    },
    getters: {
        news(state) {
            return state.news.slice().reverse()
        },
        allUsers(state) {
            return state.allUsers
        }
    },
    actions: {
        getnews({commit}) {
            return axios.get('/api/news').then(({data}) => {
                commit('SET_NEWS', data)
            });
        },
        getAllUsers({commit}) {
            return axios.get('/api/allUsers').then(({data}) => {
                commit('SET_ALL', data)
            });
        },
    },
    mutations: {
        SET_NEWS(state, news) {
            state.news = news
        },
        SET_ALL(state, allUsers) {
            state.allUsers = allUsers
        },
    },
}