import axios from "axios"

export default {
    state: {
        businessCategory: [],
    },
    getters: {
        businessCategory(state) {
            return state.businessCategory.slice().reverse()
        }
    },
    actions: {
        getbusinessCategory({commit}) {
            return axios.get('/api/businessCategory').then(({data}) => {
                commit('SET_BUSINESS_CATEGORY', data)
            });
        },
        newbusinessCategory({commit}, businessCategory) {
            return axios.post('/api/businessCategory').then(res => {
                console.log(res.data)
                commit('NEW_BUSINESS_CATEGORY', businessCategory)
            })
        },
        removebusinessCategory({commit}, id) {
            return axios.delete('/api/businessCategory/' + id).then(res => {
                commit('DELETE_BUSINESS_CATEGORY', id)
            })
        },
        async updatebusinessCategory({commit}, id, businessCategory) {
            try {
                let result = await axios.put('/api/businessCategory/'+ id, businessCategory)
                console.log(result.response.data)
                commit('EDIT_BUSINESS_CATEGORY', businessCategory)
            } catch (error) {
                console.error(error.response.data)
            }
        },
    },
    mutations: {
        SET_BUSINESS_CATEGORY(state, businessCategory) {
            state.businessCategory = businessCategory
        },
        NEW_BUSINESS_CATEGORY(state, businessCategory) {
            state.businessCategory = state.businessCategory.unshift(businessCategory)
        },
        DELETE_BUSINESS_CATEGORY(state, id) {
            state.businessCategory = state.businessCategory.filter(s => {
                return s.id !== id
            })
        },
        EDIT_BUSINESS_CATEGORY(state, businessCategory) {
            const index = state.businessCategory.find(s => s.id === businessCategory.id)
        }
    },
}