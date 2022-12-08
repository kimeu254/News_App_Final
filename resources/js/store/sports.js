import axios from "axios"

export default {
    state: {
        sportsCategory: [],
    },
    getters: {
        sportsCategory(state) {
            return state.sportsCategory.slice().reverse()
        }
    },
    actions: {
        getsportsCategory({commit}) {
            return axios.get('/api/sportsCategory').then(({data}) => {
                commit('SET_SPORTS_CATEGORY', data)
            });
        },
        newsportsCategory({commit}, sportsCategory) {
            return axios.post('/api/sportsCategory').then(res => {
                console.log(res.data)
                commit('NEW_SPORTS_CATEGORY', sportsCategory)
            })
        },
        removesportsCategory({commit}, id) {
            return axios.delete('/api/sportsCategory/' + id).then(res => {
                commit('DELETE_SPORTS_CATEGORY', id)
            })
        },
        async updatesportsCategory({commit}, id, sportsCategory) {
            try {
                let result = await axios.put('/api/sportsCategory/'+ id, sportsCategory)
                console.log(result.response.data)
                commit('EDIT_SPORTS_CATEGORY', sportsCategory)
            } catch (error) {
                console.error(error.response.data)
            }
        },
    },
    mutations: {
        SET_SPORTS_CATEGORY(state, sportsCategory) {
            state.sportsCategory = sportsCategory
        },
        NEW_SPORTS_CATEGORY(state, sportsCategory) {
            state.sportsCategory = state.sportsCategory.unshift(sportsCategory)
        },
        DELETE_SPORTS_CATEGORY(state, id) {
            state.sportsCategory = state.sportsCategory.filter(s => {
                return s.id !== id
            })
        },
        EDIT_SPORTS_CATEGORY(state, sportsCategory) {
            const index = state.sportsCategory.find(s => s.id === sportsCategory.id)
        }
    },
}