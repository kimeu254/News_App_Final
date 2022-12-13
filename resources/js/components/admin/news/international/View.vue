<template>
    <div class="container">
        <h1 style="font-weight: bolder;">{{news.headline}}</h1>
        <div class="py-3">
            <img :src="'/storage/posts/' + news.image" class="img-fluid w-100" style=" object-fit: cover;">
        </div>
        <div class="py-3">
            <p style="white-space:pre-wrap;">{{news.story}}</p>
        </div>     
        <div class="py-3" v-if="(news.image_one != null)">
            <img :src="'/storage/posts/' + news.image_one" class="img-fluid w-100" style="object-fit: cover;">
        </div>
        <p style="white-space:pre-wrap;">{{news.story_one}}</p>
        <div class="py-3" v-if="(news.url != null)">
            <div class="embed-responsive ratio ratio-16x9">
                <iframe :src="'https://www.youtube.com/embed/'+news.url" frameborder="0"></iframe>
            </div>        
        </div>
        <div class="py-3">
            <p style="white-space:pre-wrap;">{{news.story_two}}</p>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    data() {
        return{
            success: '',
        }
    },
    computed: {
        news() {
            return this.$store.state.internationalNews.internationalNews.find(f => f.id == this.$route.params.id)
        },
    },
    methods: {
        onChange(e) {
            this.file = e.target.files[0];
        },
       
    },
}
</script>

<style scoped>

</style>