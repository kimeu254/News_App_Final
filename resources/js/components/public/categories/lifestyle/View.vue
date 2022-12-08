<template>
    <div class="container">
        <div class="py-3">
            <h6>Category <small style="font-size: 12px;">></small> Lifestyle</h6>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div>
                    <h1>{{news.headline}}</h1>
                </div>
                <div>
                    <span>Author: </span>
                    <span>Bumblee</span>
                </div>
                <div>
                    <small>Dec 3, 2022</small>
                </div>
                <div class="py-3">
                    <img :src="'/storage/posts/' + news.image" class="img-fluid w-100" style="height: 400px; object-fit: cover;">
                </div>
                <div>
                    <p class="h5" style="white-space: pre-wrap;">{{news.story}}</p>
                </div>
                <div class="py-3">
                    <h6>Share:</h6>
                    <div class="">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-whatsapp"></a>
                    </div>
                </div>
                <div>
                    <h5>Related Stories</h5>
                    <div class="row">
                        <div class="col-md-4" v-for="story in lifestyleCategory.slice(0, 6)" :key="story.id">
                            <div style="background: white;">
                                <img :src="'/storage/posts/' + story.image" class="img-fluid w-100" style="height: 150px; object-fit: cover;">
                                <router-link :to="{name:'viewLifestyle', params:{headline:story.headline}}" class="h4 text-dark" style="text-decoration: none;">
                                    <p class="p-2 h6">{{story.headline}}</p>
                                </router-link>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    data() {
        return{}
    },
    computed: {
        news() {
            return this.$store.state.lifestyle.lifestyleCategory.find(f => f.headline == this.$route.params.headline)
        },
        ...mapGetters(["lifestyleCategory"])
    },
    methods: {}
}
</script>
<style scoped>

</style>