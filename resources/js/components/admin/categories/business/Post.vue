<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post News</div>
                    <div class="card-body">
                        <!-- <div v-if="success != ''" class="alert alert-success alert-dismissible fade show" role="alert">
                            <span>{{success}}</span>
                        </div> -->
                        <form ref="form" @submit.prevent="onSubmit">
                            <div class="mb-4">
                                <input type="text" v-model="headline" class="form-control" placeholder="Headline" required>
                            </div>
                            <div class="mb-4">
                                <input type="file" class="form-control" v-on:change="onChange" required>
                            </div>
                            <div id="preview">
                                <img v-if="url" :src="url" />
                            </div>
                            <div class="mb-4">
                                <textarea v-model="story" class="form-control" placeholder="Type your story here..." style="height: 100px" required></textarea>
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
export default {
    name: 'post',
    data() {
        return{
            success: '',
            headline: '',
            file: '',
            story: '',
            url: '',
        }
    },
    mounted() {
        
    },
    methods: {
        onChange(e) {
            console.log(e.target.files[0]);
            this.file = e.target.files[0];
            this.url = URL.createObjectURL(this.file);
        },
        onSubmit() {
            let existingObj = this;
            let data = new FormData();
            data.append('file', this.file);
            data.append('headline', this.headline);
            data.append('story', this.story);
            axios.post('/api/businessCategory', data)
                .then((res) => {
                    existingObj.success = res.data.success
                    this.$refs.form.reset();
                    this.$swal.fire({
                        icon: 'success',
                        title: existingObj.success,
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        background: '#a5dc86',
                        iconColor: '#fff',
                    })
                })
                .catch(error => {
                    existingObj.output = error
                    console.log(error.response.data.errors)
                    this.$swal.fire({
                        icon: 'error',
                        title: error,
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        background: '#f27474',
                        iconColor: '#fff',
                    })
                })
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