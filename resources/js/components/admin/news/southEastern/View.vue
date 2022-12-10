<template>
    <div class="container">
        <h1>{{news.headline}}</h1>
        <div>
            <img :src="'/storage/posts/' + news.image" class="img-fluid w-50" style="height: 300px; object-fit: cover;">
        </div>
        <p style="white-space:pre-wrap;">{{news.story}}</p>
        <div v-if="(news.image_one != null)">
            <img :src="'/storage/posts/' + news.image_one" class="img-fluid w-50" style="height: 300px; object-fit: cover;">
        </div>
        <p style="white-space:pre-wrap;">{{news.story_one}}</p>
        <div v-if="(news.image_two != null)">
            <img :src="'/storage/posts/' + news.image_two" class="img-fluid w-50" style="height: 300px; object-fit: cover;">
        </div>
        <p style="white-space:pre-wrap;">{{news.story_two}}</p>
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
            return this.$store.state.southEasternNews.southEasternNews.find(f => f.id == this.$route.params.id)
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