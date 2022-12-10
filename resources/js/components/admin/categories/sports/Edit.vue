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
                                <img v-if="url" :src="url" />
                                <img v-else :src="'/storage/posts/' + news.image">
                            </div>
                            
                            <div class="mb-4">
                                <textarea v-model="news.story" class="form-control" placeholder="Type your story here..." style="height: 100px"></textarea>
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
            url: '',
        }
    },
    computed: {
        news() {
            return this.$store.state.sports.sportsCategory.find(f => f.id == this.$route.params.id)
        },
    },
    methods: {
        onChange(e) {
            this.file = e.target.files[0];
            console.log(e.target.files[0]);
            this.url = URL.createObjectURL(this.file);
            
        },

        async onSubmit() {
            try {
                let id = this.news.id
                const formData = new FormData()
                formData.append('file', this.file)
                formData.append('headline', this.news.headline)
                formData.append('story', this.news.story)
                formData.append("_method", 'put')
                const response = await axios.post("/api/sportsCategory/"+id, formData)
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