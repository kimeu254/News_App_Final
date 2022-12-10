<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        <form @submit.prevent="onSubmit">
                            <div class="mb-4">
                                <input type="text" v-model="author.first_name" class="form-control" placeholder="First Name">
                            </div>
                            <div class="mb-4">
                                <input type="text" v-model="author.last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="mb-4">
                                <input type="text" v-model="author.email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="mb-4">
                                <input type="text" v-model="author.contact" class="form-control" placeholder="Mobile">
                            </div>
                            <div class="mb-4">
                                <input type="text" v-model="author.address" class="form-control" placeholder="Home Address">
                            </div>
                            <div class="mb-4">
                                <textarea v-model="author.bio"  class="form-control" placeholder="Tell us about yourself..." style="height: 100px"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn ms-2">Save Changes</button>
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
    data () {
        return {
            success: '',
            url: '',
        }
    },
    mounted() {},
    computed: {
        author() {
            return this.$store.state.news.allUsers.find(f => f.id == this.$route.params.id)
        },
    },
    methods: {
        async onSubmit() {
            try {
                const formData = new FormData()
                formData.append('first_name', this.author.first_name)
                formData.append('last_name', this.author.last_name)
                formData.append('email', this.author.email)
                formData.append('contact', this.author.contact)
                formData.append('address', this.author.address)
                formData.append('bio', this.author.bio)
                formData.append("_method", 'put')
                const response = await axios.post("/api/user", formData)
                .then(res => {
                    console.log(res.data)
                })
                .then(() => {
                        this.$swal.fire({
                            icon: 'success',
                            title: 'Profile updated succesfully',
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