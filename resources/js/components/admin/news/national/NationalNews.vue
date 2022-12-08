<template>
    <div>
        <div class="d-flex justify-content-end mb-3">
            <router-link to="/Admin/News/National/Post" class="btn btn-secondary pull-right">
                Add news
            </router-link>
        </div>
        <div class="mb-4">
            <h4>National News</h4>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-hover table-condensed" style="width:100%">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Headline</th>
                        <th>Story</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="news in nationalNews" :key="news.id">
                        <td>{{news.id}}</td>
                        <td>{{news.headline}}</td>
                        <td>{{news.story}}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <div class="">
                                    <router-link :to="{name: 'viewNationalNews', params: {id: news.id}}">
                                        <button class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="view"><i class="bi bi-eye"></i></button>
                                    </router-link>
                                </div>
                                <div class="px-2">
                                    <router-link :to="{name: 'editNationalNews', params: {id: news.id}}">
                                        <button class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="edit"><i class="bi bi-pencil"></i></button>
                                    </router-link>
                                </div>
                                <div>
                                    <button @click="deletePost(news.id)" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import $ from "jquery"
import { mapGetters } from 'vuex';

export default {
    name: 'nationalNews',
    data() {
        return{}
    },
    mounted() {
        this.$store.dispatch("getnationalNews").then(() => {
            $('#example').DataTable({
                order: [[0, 'desc']],
            });
        });
    },
    computed: {
        ...mapGetters(["nationalNews"])
    },
    methods: {
        deletePost(id) {
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((response)=>{
                if (response.isConfirmed){
                    this.$store.dispatch("removenationalNews", id)
                    this.$swal.fire(
                        {
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }
                    )
                } else if (
                    response.dismiss === Swal.DismissReason.cancel
                ) {
                    this.$swal.fire({
                        title: 'Canceled',
                        text: 'Your imaginary file is safe :)',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        },
    }
}
</script>

<style>

div.dataTables_wrapper div.dataTables_filter input {
    height: 2em;
}
div.dataTables_wrapper div.dataTables_filter input:focus {
    outline: none;
    box-shadow: none !important;
}

</style>