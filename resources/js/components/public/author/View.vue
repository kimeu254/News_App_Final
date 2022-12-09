<template>
    <div>
        <div class="container mt-5 mb-5">
            <div class="row no-gutters pb-5">
                <div class="col-md-4 col-lg-4"><img src="https://i.imgur.com/aCwpF7V.jpg"></div>
                <div class="col-md-8 col-lg-8">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                            <h3 class="display-5">{{author.first_name}} {{author.last_name}}</h3>
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-instagram"></i>
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-whatsapp"></i>
                            <i class="fa fa-linkedin"></i>
                        </div>
                        <div class="p-3 bg-black text-white">
                            <h5>Bio</h5>
                            <div>
                                <p style="font-weight:lighter; font-size:small white-space: pre-wrap;">{{author.bio}}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row text-white">
                            <div class="p-3 bg-primary text-center skill-block">
                                <h4>Email</h4>
                                <h6>{{author.email}}</h6>
                            </div>
                            <div class="p-3 bg-success text-center skill-block">
                                <h4>Phone</h4>
                                <h6>{{author.contact}}</h6>
                            </div>
                            <div class="p-3 bg-warning text-center skill-block">
                                <h4>Address</h4>
                                <h6>{{author.address}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="title px-2">
                    Stories
                </div>
                <div class="col-md-3" v-for="story in news.slice(0,20)" :key="story.id">
                    <div v-if="(story.posted_by == author.id)">
                        <div class="con">
                            <img :src="'/storage/posts/' + story.image" alt="" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                        </div>
                        <div>
                            <router-link :to="{name:'viewNews', params:{headline:story.headline}}" class="headline h5" style="">
                                {{story.headline}}
                            </router-link>
                            <div>
                                <div class="px-2">
                                    <small style="font-weight:100; font-size: xx-small;">{{ story.created_at.slice(0, 10) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    data() {},
    computed: {
        author() {
            return this.$store.state.news.allUsers.find(f => f.first_name == this.$route.params.first_name)
        },
        ...mapGetters(["news"]),
    },
    mounted() {},
    methods: {},
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

.bg-black {
  background: #000;
}

.skill-block {
  width: 40%;
}

@media (min-width: 991px) and (max-width:1200px) {
  .skill-block {
    padding: 32px !important;
  }
}

@media (min-width: 1200px) {
  .skill-block {
    padding: 56px !important;
  }
}

</style>