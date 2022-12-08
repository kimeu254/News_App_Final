import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from '@/store/auth'
import news from '@/store/news'
import southEasternNews from '@/store/southEasternNews'
import nationalNews from '@/store/nationalNews'
import internationalNews from '@/store/internationalNews'
import business from '@/store/business'
import politics from '@/store/politics'
import sports from '@/store/sports'
import lifestyle from '@/store/lifestyle'


const store = createStore({
    plugins:[
        createPersistedState()
    ],
    modules:{
        auth,
        southEasternNews,
        nationalNews,
        internationalNews,
        business,
        sports,
        lifestyle,
        politics,
        news,
    }
})

export default store