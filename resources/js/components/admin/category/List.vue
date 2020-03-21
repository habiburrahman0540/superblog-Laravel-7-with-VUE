<template>
    <div class="div">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Category List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">


                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">All Category Data</h3>
                                <div class="card-tools">

                                       <router-link to="/add-category" class="btn btn-primary btn-lg">Add category</router-link>

                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(category,index) in getcategorydata" :key="category.id">
                                        <td>{{index+1}}</td>
                                        <td>{{category.cat_name}}</td>
                                        <td>{{category.created_at | timeFormat}}</td>
                                        <td>

                                            <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                                            ||
                                            <a href="" @click.prevent="deleteCategory(category.id)">Delete</a>
                                        </td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
        mounted() {
            this.$store.dispatch('allCategory')
        },
        computed:{
            getcategorydata(){
               return this.$store.getters.getCategory
            }
        },
        methods:{
            deleteCategory(id){
                axios.get('/category/'+id).
                then(()=>{
                   this.$store.dispatch('allCategory')
                    Toast.fire({
                                    icon: 'error',
                                    title: 'Category deleted successfully .'
                                    })  
                })
            }
        }
    }
</script>

<style scoped>

</style>