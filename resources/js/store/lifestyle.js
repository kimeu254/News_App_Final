import axios from "axios"

export default {
    state: {
        lifestyleCategory: [],
    },
    getters: {
        lifestyleCategory(state) {
            return state.lifestyleCategory.slice().reverse()
        }
    },
    actions: {
        getlifestyleCategory({commit}) {
            return axios.get('/api/lifestyleCategory').then(({data}) => {
                commit('SET_LIFESTYLE_CATEGORY', data)
            });
        },
        newlifestyleCategory({commit}, lifestyleCategory) {
            return axios.post('/api/lifestyleCategory').then(res => {
                console.log(res.data)
                commit('NEW_LIFESTYLE_CATEGORY', lifestyleCategory)
            })
        },
        removelifestyleCategory({commit}, id) {
            return axios.delete('/api/lifestyleCategory/' + id).then(res => {
                commit('DELETE_LIFESTYLE_CATEGORY', id)
            })
        },
        async updatelifestyleCategory({commit}, id, lifestyleCategory) {
            try {
                let result = await axios.put('/api/lifestyleCategory/'+ id, lifestyleCategory)
                console.log(result.response.data)
                commit('EDIT_LIFESTYLE_CATEGORY', lifestyleCategory)
            } catch (error) {
                console.error(error.response.data)
            }
        },
    },
    mutations: {
        SET_LIFESTYLE_CATEGORY(state, lifestyleCategory) {
            state.lifestyleCategory = lifestyleCategory
        },
        NEW_LIFESTYLE_CATEGORY(state, lifestyleCategory) {
            state.lifestyleCategory = state.lifestyleCategory.unshift(lifestyleCategory)
        },
        DELETE_LIFESTYLE_CATEGORY(state, id) {
            state.lifestyleCategory = state.lifestyleCategory.filter(s => {
                return s.id !== id
            })
        },
        EDIT_LIFESTYLE_CATEGORY(state, lifestyleCategory) {
            const index = state.lifestyleCategory.find(s => s.id === lifestyleCategory.id)
        }
    },
}