<template>
    <div class="container">
        <div class="py-3">
            <h6>News <small style="font-size: 12px;">></small> SouthEastern</h6>
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
                        <div class="col-md-4" v-for="story in southEasternNews.slice(0, 6)" :key="story.id">
                            <div style="background: white;">
                                <img :src="'/storage/posts/' + story.image" class="img-fluid w-100" style="height: 150px; object-fit: cover;">
                                <router-link :to="{name:'viewsouthEastern', params:{headline:story.headline}}" class="h4 text-dark" style="text-decoration: none;">
                                    <p class="p-2 h6">{{story.headline}}</p>
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
        news() {
            return this.$store.state.southEasternNews.southEasternNews.find(f => f.headline == this.$route.params.headline)
        },
        ...mapGetters(["southEasternNews"])
    },
    methods: {}
}
</script>
<style>
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
</style>