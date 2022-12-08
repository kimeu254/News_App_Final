import axios from "axios"

export default {
    state: {
        politicsCategory: [],
    },
    getters: {
        politicsCategory(state) {
            return state.politicsCategory.slice().reverse()
        }
    },
    actions: {
        getpoliticsCategory({commit}) {
            return axios.get('/api/politicsCategory').then(({data}) => {
                commit('SET_POLITICS_CATEGORY', data)
            });
        },
        newpoliticsCategory({commit}, politicsCategory) {
            return axios.post('/api/politicsCategory').then(res => {
                console.log(res.data)
                commit('NEW_POLITICS_CATEGORY', politicsCategory)
            })
        },
        removepoliticsCategory({commit}, id) {
            return axios.delete('/api/politicsCategory/' + id).then(res => {
                commit('DELETE_POLITICS_CATEGORY', id)
            })
        },
        async updatepoliticsCategory({commit}, id, politicsCategory) {
            try {
                let result = await axios.put('/api/politicsCategory/'+ id, politicsCategory)
                console.log(result.response.data)
                commit('EDIT_POLITICS_CATEGORY', politicsCategory)
            } catch (error) {
                console.error(error.response.data)
            }
        },
    },
    mutations: {
        SET_POLITICS_CATEGORY(state, politicsCategory) {
            state.politicsCategory = politicsCategory
        },
        NEW_POLITICS_CATEGORY(state, politicsCategory) {
            state.politicsCategory = state.politicsCategory.unshift(politicsCategory)
        },
        DELETE_POLITICS_CATEGORY(state, id) {
            state.politicsCategory = state.politicsCategory.filter(s => {
                return s.id !== id
            })
        },
        EDIT_POLITICS_CATEGORY(state, politicsCategory) {
            const index = state.politicsCategory.find(s => s.id === politicsCategory.id)
        }
    },
}