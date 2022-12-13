<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit News</div>
                    <div class="card-body">
                        <!-- <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div> -->
                        <form @submit.prevent="onSubmit">
                            <div class="mb-4">
                                <input type="text" v-model="news.headline" class="form-control" placeholder="Headline">
                            </div>
                            <div class="mb-4">
                                <input type="file" class="form-control" v-on:change="onChange">
                            </div>
                            <div id="preview">
                                <img v-if="url_one" :src="url_one" />
                                <div v-else>
                                    <div v-if="(news.image_one != null)" class="row g-1">
                                        <div class="col-sm-6">
                                            <figure class="figure">
                                                <img :src="'/storage/posts/' + news.image" class="figure-img img-fluid" alt="...">
                                                <figcaption class="figure-caption">Image One</figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-sm-6">
                                            <figure class="figure">
                                                <img :src="'/storage/posts/' + news.image_one" class="figure-img img-fluid" alt="...">
                                                <figcaption class="figure-caption">Image Two</figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div v-else class="row">
                                        <div class="col-sm-12">
                                            <figure class="figure">
                                                <img :src="'/storage/posts/' + news.image" class="figure-img img-fluid" alt="...">
                                                <figcaption class="figure-caption">Image One</figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h5>Part 1</h5>
                                <textarea v-model="news.story" class="form-control" placeholder="Type your story here..." style="height: 100px"></textarea>
                            </div>
                            <div class="mb-4" v-if="(news.story_one != null)">
                                <h5>Part 2</h5>
                                <textarea v-model="news.story_one" class="form-control" placeholder="Type your story here..." style="height: 100px"></textarea>
                            </div>
                            <div class="mb-4" v-if="(news.story_two != null)">
                                <h5>Part 3</h5>
                                <input type="text" v-model="news.url" class="form-control mb-5" placeholder="YouTube URL">
                                <div class="embed-responsive ratio ratio-16x9 mb-5">
                                    <iframe :src="'https://www.youtube.com/embed/'+news.url" frameborder="0"></iframe>
                                </div> 
                                <textarea v-model="news.story_two" class="form-control" placeholder="Type your story here..." style="height: 100px"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn ms-2">Post News</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    data() {
        return{
            success: '',
            url_one: '',
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
            console.log(e.target.files[0]);
            this.url_one = URL.createObjectURL(this.file);
            
        },

        async onSubmit() {
            try {
                let id = this.news.id
                const formData = new FormData()
                formData.append('file', this.file)
                formData.append('headline', this.news.headline)
                formData.append('story', this.news.story)
                if (this.news.story_one != null) {
                    formData.append('story_one', this.news.story_one)
                }
                if (this.news.url != null) {
                    formData.append('url', this.news.url)
                }
                if (this.news.story_two != null) {
                    formData.append('story_two', this.news.story_two)
                }
                formData.append("_method", 'put')
                const response = await axios.post("/api/southEasternNews/"+id, formData)
                .then(res => {
                    console.log(res.data)
                })
                .then(() => {
                        this.$swal.fire({
                            icon: 'success',
                            title: 'news updated succesfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                })               
            } catch (error) {
                console.error(error.response.data)
            }
            
        }
    },
}
</script>

<style scoped>
.btn {
    background: #ff2942;
    color: #ffffff;
}
.btn:hover {
    background: rgb(216, 37, 37);
    color: white;
}

#preview {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 40px;
}
#preview img {
    max-width: 100%;
    max-height: 300px;
}

</style>