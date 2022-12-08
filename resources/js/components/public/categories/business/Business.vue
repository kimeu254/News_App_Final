<template>
    <div class="container">
        <div>
            <h2>Business</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="py-4" v-for="news in businessCategory" :key="news.id">
                    <div class="row" style="background: white;" >
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
        return{}
    },
    mounted() {},
    computed: {
        ...mapGetters(["businessCategory"])
    },
}
</script>

<style scoped>
img{
    transition: transform .5s ease;
}
img:hover{
    cursor: pointer;
}
</style>