<template>
    <div class="div">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Category</h1>
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
                                <h3 class="card-title">Add New Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" @click.prevent="addCategory()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="catName">Category Name</label>
                                        <input type="text" name="cat_name" v-model="form.cat_name"  class="form-control" :class="{ 'is-invalid': form.errors.has('cat_name') }"
                                         id="catName" placeholder="Enter Category Name">
                                         <has-error :form="form" field="cat_name"></has-error>
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
    export default {
        name: "New",
        data(){
            return{
               form: new Form({
                   cat_name:''
               }) 
            }
        },
        methods:{
                addCategory(){
                    this.form.post('add-category').
                    then((response)=>{
                        this.$router.push('/categorylist');
                        Toast.fire({
                                    icon: 'success',
                                    title: 'Category added successfully .'
                                    })
                    }).catch(()=>{

                    })
                }
        }
    }
</script>

<style scoped>

</style>