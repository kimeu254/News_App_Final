<template>
    <div class="container">
        <div class="py-3">
            <h6 style="color: gray; font-size: x-small;">Home <small>/</small> Stories</h6>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div>
                    <h1 style="font-weight: bolder;">{{story.headline}}</h1>
                </div>
                <div class="d-flex">
                    <div v-for="author in allUsers">
                        <router-link class="headline" :to="{name:'author', params:{first_name:author.first_name}}" style="font-weight: 700; font-size:x-small" v-if="(story.posted_by == author.id)">Author: {{author.first_name}} {{author.last_name}}</router-link> 
                    </div>
                    <div class="px-2">
                        <small style="font-weight:100; font-size: xx-small;">{{ story.created_at.slice(0, 10) }}</small>
                    </div>
                </div>
                <div class="py-3">
                    <div class="con">
                        <img :src="'/storage/posts/' + story.image" class="img-fluid w-100" style="height: 370px;">
                    </div>
                </div>
                <div class="py-3">
                    <p class="h6" style="white-space: pre-wrap;">{{story.story}}</p>
                </div>
                <div class="py-3" v-if="(story.image_one != null)">
                    <div class="con">
                        <img :src="'/storage/posts/' + story.image_one" class="img-fluid w-100" style="height: 500px;">
                    </div>
                </div>
                <div class="py-3" v-if="(story.story_one != null)">
                    <p class="h6" style="white-space: pre-wrap;">{{story.story_one}}</p>
                </div>
                <div class="py-3" v-if="(story.url != null)">
                    <div class="embed-responsive ratio ratio-16x9">
                        <iframe :src="'https://www.youtube.com/embed/'+story.url" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="py-3" v-if="(story.story_two != null)">
                    <p class="h6" style="white-space: pre-wrap;">{{story.story_two}}</p>
                </div>
                <div class="py-3">
                    <h6 style="font-weight: bold;">Share:</h6>
                    <div class="">
                        <ShareNetwork network="facebook" url="" :title="story.headline" :description="story.story.slice(0,20)">
                            <a class="fa fa-facebook"></a>
                        </ShareNetwork>
                        <ShareNetwork network="telegram" url="" :title="story.headline" :description="story.story.slice(0,20)">
                            <a class="fa fa-instagram"></a>
                        </ShareNetwork>
                        <ShareNetwork network="twitter" url="" :title="story.headline" :description="story.story.slice(0,20)">
                            <a class="fa fa-twitter"></a>
                        </ShareNetwork>
                        <ShareNetwork network="whatsapp" url="" :title="story.headline" :description="story.story.slice(0,20)">
                            <a class="fa fa-whatsapp"></a>
                        </ShareNetwork>
                    </div>
                </div>
                <div>
                    <h5 style="font-weight: bold;">Related Stories</h5>
                    <div class="row">
                        <div class="col-md-4" v-for="post in news.slice(0, 6)" :key="post.id">
                            <div style="background: white;">
                                <div class="con">
                                    <img :src="'/storage/posts/' + post.image" class="img-fluid w-100" style="height: 150px;">
                                </div>
                                <router-link :to="{name:'viewNews', params:{headline:post.headline}}" class="h4 headline">
                                    <p class="p-2 h6">{{post.headline}}</p>
                                </router-link>
                            </div>
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
    data() {
        return{}
    },
    computed: {
        story() {
            return this.$store.state.news.news.find(f => f.headline == this.$route.params.headline)
        },
        ...mapGetters(["news", "allUsers"])
    },
    methods: {}
}
</script>
<style scoped>
.fa {
  padding: 10px;
  font-size: 30px;
  width: 70px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-instagram {
  background: #E1306C;
  color: white;
}

.fa-whatsapp {
    background: #25D366;
    color: white;
}

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

.headline{
    font-weight:700;
    color: black;
    text-decoration: none;
}

.headline:hover{
    color: #ff2942;
}
</style>