<template>
    <div class="div">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Post</h1>
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
                                <h3 class="card-title">Add New Post</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" enctype="multipart/form-data" @submit.prevent="addnewpost()" >
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="postid">Post Title</label>
                                        <input type="text" name="title" v-model="form.title"  class="form-control" :class="{ 'is-invalid': form.errors.has('title') }"
                                         id="postid" placeholder="Enter post title here">
                                         <has-error :form="form" field="title"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label for="postdescription">Post description</label>
                                        <ckeditor name="description" :editor="editor" v-model="form.description" :config="editorConfig" :class="{ 'is-invalid': form.errors.has('description') }"
                                         id="postdescription" placeholder="Enter post description here"></ckeditor>
                                         <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Category Name</label>
                                        <select name="cat_id" class="form-control" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
                                        <option disabled value="" >Select Category</option>
                                        <option :value="category.id" v-for="category in getcategorydata">{{category.cat_name}}</option>
                                        
                                        </select>
                                         <has-error :form="form" field="cat_id"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Photo input</label>
                                            <input @change="changephoto($event)" type="file" class="form-control" id="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
                                          <span></span> 
                                            <img :src="form.photo" alt="" width="80" height="80">
                                             <has-error :form="form" field="photo"></has-error>
                                    
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->

                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</template>

<script>
 import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        name: "New",
       data(){
           return {
               editor: ClassicEditor,
               editorConfig: {
                 
                },
               form: new Form({
                   title :'',
                   description :'',
                   cat_id :'',
                   photo :'',
               })
           }
       },
       mounted(){
 this.$store.dispatch('allCategory')
       },
       computed:{
            getcategorydata(){
               return this.$store.getters.getCategory
            }
       },
       methods:{
           changephoto(event){
                            let file = event.target.files[0];
                           if(file.size>1048576){
                               Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>Why do I have this issue?</a>'
                                    })
                           }else{
                                 let reader = new FileReader();
                                reader.onload = event=> {
                                    // The file's text will be printed here
                                    this.form.photo = event.target.result
                                    console.log(event.target.result);
                                    
                            };

                            reader.readAsDataURL(file);
                           }
               
           },
           addnewpost(){
               this.form.post('savepost')
               .then(()=>{
                   this.$router.push('/post-list');
                   Toast.fire({
                                    icon: 'success',
                                    title: 'Post added successfully .'
                                    })
               }).catch(()=>{

               })
           }
       }
        
    }
</script>

<style scoped>

</style>