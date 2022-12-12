<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post News</div>
                    <div class="p-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" v-on:click="toggleTabs(1)" v-bind:class="{'text-dark': openTab !== 1, 'active': openTab === 1}">Part 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" v-on:click="toggleTabs(2)" v-bind:class="{'text-dark': openTab !== 2, 'active': openTab === 2}">Part 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" v-on:click="toggleTabs(3)" v-bind:class="{'text-dark': openTab !== 3, 'active': openTab === 3}">Part 3 </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form ref="form" @submit.prevent="onSubmit" :class="{'hidden': openTab !== 1, 'block': openTab === 1}">
                            <div class="mb-4">
                                <input type="text" v-model="headline" class="form-control" placeholder="Headline" required>
                            </div>
                            <div class="mb-4">
                                <input type="file" class="form-control" v-on:change="onChange" required>
                            </div>
                            <div id="preview">
                                <img v-if="url_one" :src="url_one" />
                            </div>
                            <div class="mb-4">
                                <textarea v-model="story" class="form-control" placeholder="Type your story here..." style="height: 100px" required></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn ms-2">Post News</button>
                            </div>
                        </form>
                        <form ref="form" @submit.prevent="onDoubleSubmit" :class="{'hidden': openTab !== 2, 'block': openTab === 2}">
                            <div class="mb-4">
                                <input type="file" class="form-control" v-on:change="onChange" required>
                            </div>
                            <div id="preview">
                                <img v-if="url_one" :src="url_one" />
                            </div>
                            <div class="mb-4">
                                <textarea v-model="story_one" class="form-control" placeholder="Type your story here..." style="height: 100px"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn ms-2">Post News</button>
                            </div>
                        </form>
                        <form ref="form" @submit.prevent="onTripleSubmit" :class="{'hidden': openTab !== 3, 'block': openTab === 3}">
                            <div class="mb-4">
                                <input type="text" v-model="url" class="form-control" placeholder="YouTube URL" required>
                            </div>
                            <div class="mb-4">
                                <textarea v-model="story_two" class="form-control" placeholder="Type your story here..." style="height: 100px"></textarea>
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
    data() {
        return{
            openTab: 1,
            success: '',
            headline: '',
            file: '',
            story: '',
            story_one: '',
            story_two: '',
            url: '',
            url_one: ''
        }
    },
    mounted() {
        
    },
    methods: {
        onChange(e) {
            console.log(e.target.files[0]);
            this.file = e.target.files[0];
            this.url_one = URL.createObjectURL(this.file);
        },
        toggleTabs(tabNumber){
            this.openTab = tabNumber
            //window.scrollTo(0,0);
        },
        onSubmit() {
            let existingObj = this;
            let data = new FormData();
            data.append('file', this.file);
            data.append('headline', this.headline);
            data.append('story', this.story);
            axios.post('/api/sportsCategory', data)
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
        },

        onDoubleSubmit() {
            let existingObj = this;
            let data = new FormData();
            data.append('file', this.file);
            data.append('story_one', this.story_one);
            axios.post('/api/sportsCategory/story', data)
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
        },
        onTripleSubmit() {
            let existingObj = this;
            let data = new FormData();
            data.append('url', this.url);
            data.append('story_two', this.story_two);
            axios.post('/api/sportsCategory/story/new', data)
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
.nav-pills .nav-item .active {
    background-color: #ff2942;
}
.nav-pills .nav-item a:hover {
    cursor: pointer;
}
.hidden {
    display: none;
}
.block {
    display: block;
}
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