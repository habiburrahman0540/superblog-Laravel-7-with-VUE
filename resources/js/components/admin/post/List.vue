<template>
    <div class="div">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Post List</h1>
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
                                <h3 class="card-title">All Post Data</h3>
                                <div class="card-tools">

                                       <router-link to="/add-post" class="btn btn-primary btn-lg">Add New Post</router-link>

                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>User Name</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(posts,index) in getallpostdata" :key="posts.id">
                                        <td>{{index+1}}</td>
                                        <td v-if="posts.user">{{posts.user.name}}</td>
                                        <td v-if="posts.category">{{posts.category.cat_name}}</td>
                                        <td>{{posts.title}}</td>
                                        <td v-html="$options.filters.shortlength(posts.description,200,'.......')"></td>
                                        <td><img :src="imageshow(posts.photo)" alt="" width="60" height="60"></td>
                                        <td>
                                            <router-link :to="`/edit-post/${posts.id}`">Edit</router-link> ||  <a href="" @click.prevent="deletepost(posts.id)">Delete</a>
                                            
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
        mounted(){
            this.$store.dispatch('allposts')
        },
        computed:{
            getallpostdata(){
               return this.$store.getters.getallpost
            }
        },
        methods:{
            imageshow(img){
            return "uploadimage/"+img;
            },
            deletepost(id){
              axios.get('/deletepost/'+id)
           
              .then(()=>{
                   this.$store.dispatch('allposts')
                                 Toast.fire({
                                    icon: 'error',
                                    title: 'Post deleted successfully .'
                                    }) 
              })
              .catch(()=>{

              })
            }
        }
       
    }
</script>

<style scoped>

</style>