<template>
    <div class="container">
        <div class="row py-5" style="">
            <div class="col-md-8" style="">
                <div class="title px-2">
                    SouthEastern
                </div>
                <div>
                    <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">
                        <div class="py-4"> 
                            <div class="row">
                                <div class="col-md-6" v-for="news in southEasternNews.slice(0,6)" :key="news.id">
                                    <div class="con">
                                        <img :src="'/storage/posts/' + news.image" alt="" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="py-3">
                                        <router-link :to="{name:'viewsouthEastern', params:{headline:news.headline}}" class="headline h5" style="">
                                            {{news.headline}}
                                        </router-link>
                                        <div class="d-flex">
                                            <div v-for="author in allUsers">
                                                <router-link class="headline" :to="{name:'author', params:{first_name:author.first_name}}" style="font-weight: 700; font-size:x-small" v-if="(news.posted_by == author.id)">Author: {{author.first_name}} {{author.last_name}}</router-link> 
                                            </div>
                                            <div class="px-2">
                                                <small style="font-weight:100; font-size: xx-small;">{{ news.created_at.slice(0, 10) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">
                        <div class="py-4"> 
                            <div class="row">
                                <div class="col-md-6" v-for="news in southEasternNews.slice(6,12)" :key="news.id">
                                    <div class="con">
                                        <img :src="'/storage/posts/' + news.image" alt="" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="py-3">
                                        <router-link :to="{name:'viewsouthEastern', params:{headline:news.headline}}" class="headline h5" style="">
                                            {{news.headline}}
                                        </router-link>
                                        <div class="d-flex">
                                            <div v-for="author in allUsers">
                                                <router-link class="headline" :to="{name:'author', params:{first_name:author.first_name}}" style="font-weight: 700; font-size:x-small" v-if="(news.posted_by == author.id)">Author: {{author.first_name}} {{author.last_name}}</router-link> 
                                            </div>
                                            <div class="px-2">
                                                <small style="font-weight:100; font-size: xx-small;">{{ news.created_at.slice(0, 10) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
                        <div class="py-4"> 
                            <div class="row">
                                <div class="col-md-6" v-for="news in southEasternNews.slice(12,18)" :key="news.id">
                                    <div class="con">
                                        <img :src="'/storage/posts/' + news.image" alt="" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="py-3">
                                        <router-link :to="{name:'viewsouthEastern', params:{headline:news.headline}}" class="headline h5" style="">
                                            {{news.headline}}
                                        </router-link>
                                        <div class="d-flex">
                                            <div v-for="author in allUsers">
                                                <router-link class="headline" :to="{name:'author', params:{first_name:author.first_name}}" style="font-weight: 700; font-size:x-small" v-if="(news.posted_by == author.id)">Author: {{author.first_name}} {{author.last_name}}</router-link> 
                                            </div>
                                            <div class="px-2">
                                                <small style="font-weight:100; font-size: xx-small;">{{ news.created_at.slice(0, 10) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
                <div>
                    <nav aria-label="..." class="pt-5">
                        <ul class="pagination justify-content-center">
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
            <div class="col-md-4" style="">
                
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: 'southEastern',
    data() {
        return{
            openTab: 1,
        }
    },
    mounted() {
        this.$store.dispatch("getAllUsers")
    },
    computed: {
        ...mapGetters(["southEasternNews", "news", "allUsers"])
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
.con {
  overflow: hidden;
}

img {
    object-fit: cover;
    display: block;
    transition: transform .4s;
}

img:hover {
    transform: scale(1.3);
    transform-origin: 50% 50%;
}

.title{
    font-weight: 900; 
    font-size: 30px;
    color: rgb(40, 116, 119);
    border: 1px solid #e7dee9;
    border-left: 5px solid #ff2942;
    margin-bottom: 10px;
}

.headline{
    font-weight:700;
    color: black;
    text-decoration: none;
}

.headline:hover{
    color: #ff2942;
}
.hidden {
    display: none;
}
.block {
    display: block;
}
.pagination > li > a
{
    background-color: white;
    color: #ff2942;
}

.pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus,
.pagination > li > span:hover
{
    color: white;
    background-color: brown;
    cursor: pointer;
}

</style>