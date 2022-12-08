<template>
    <div class="container">
        <div>
            <h2>Business</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div>
                    <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">
                        <div class="py-4" v-for="news in businessCategory.slice(0,6)" :key="news.id"> 
                            <div class="row">
                                <div class="col-md-6">
                                    <img :src="'/storage/posts/' + news.image" alt="" class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                                </div>
                                <div class="col-md-6 py-4">
                                    <router-link :to="{name:'viewBusiness', params:{headline:news.headline}}" class="h4 text-dark" style="text-decoration: none;">
                                        {{news.headline}}
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">
                        <div class="py-4" v-for="news in businessCategory.slice(6,12)" :key="news.id"> 
                            <div class="row">
                                <div class="col-md-6">
                                    <img :src="'/storage/posts/' + news.image" alt="" class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                                </div>
                                <div class="col-md-6 py-4">
                                    <router-link :to="{name:'viewBusiness', params:{headline:news.headline}}" class="h4 text-dark" style="text-decoration: none;">
                                        {{news.headline}}
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
                        <div class="py-4" v-for="news in businessCategory.slice(12,18)" :key="news.id"> 
                            <div class="row">
                                <div class="col-md-6">
                                    <img :src="'/storage/posts/' + news.image" alt="" class="img-fluid w-100" style="height: 300px; object-fit: cover;">
                                </div>
                                <div class="col-md-6 py-4">
                                    <router-link :to="{name:'viewBusiness', params:{headline:news.headline}}" class="h4 text-dark" style="text-decoration: none;">
                                        {{news.headline}}
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
                <div>
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end">
                            <li class="page-item">
                                <a class="page-link" @click="prevTab">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" v-on:click="toggleTabs(1)" v-bind:class="{'text-dark': openTab !== 1, 'text-dark': openTab === 1}">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" v-on:click="toggleTabs(2)" v-bind:class="{'text-dark': openTab !== 2, 'text-dark': openTab === 2}">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" v-on:click="toggleTabs(3)" v-bind:class="{'text-dark': openTab !== 3, 'text-dark': openTab === 3}">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" @click="nextTab">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: 'business',
    data() {
        return{
            openTab: 1
        }
    },
    mounted() {},
    computed: {
        ...mapGetters(["businessCategory"])
    },
    methods: {
        toggleTabs(tabNumber){
            this.openTab = tabNumber
            window.scrollTo(0,0);
        },
        nextTab() {
            this.openTab++
            window.scrollTo(0,0);
        },
        prevTab() {
            this.openTab--
            window.scrollTo(0,0);
        },
    }
}
</script>

<style scoped>
img{
    transition: transform .5s ease;
}
img:hover{
    cursor: pointer;
}
.hidden {
    display: none;
}
.block {
    display: block;
}
</style>