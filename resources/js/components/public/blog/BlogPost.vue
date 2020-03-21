<template>
    <span id="">
            <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Blog with left sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article v-for="posts in blogpost">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{posts.title}}</a></h3>
                    </div>
                    <img :src="`uploadimage/${posts.photo}`" alt="" />
                  </div>
                  <p v-html="$options.filters.shortlength(posts.description,300,'.......')"></p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#">{{posts.updated_at|timeFormat}}</a></li>
                      <li v-if="posts.user"><i class="icon-user"></i><a href="#">{{posts.user.name}}</a></li>
                      <li v-if="posts.category"><i class="icon-folder-open"></i><a href="#"> {{posts.category.cat_name}}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link :to="`/singlepost/${posts.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                  </div>
                </div>
              </div>
            </article>
           
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
         <Blogsidebar></Blogsidebar>
        </div>
      </div>
    </section>
    </span>
</template>
<script>
import Blogsidebar from './Blogsidebar';
export default {
  
   
    name: 'BlogPost',
    
    components:{
      Blogsidebar
    },
    mounted() {
      return this.$store.dispatch('allblogposts')
    },
    computed: {
      blogpost(){
        return this.$store.getters.getblogpost
      }
    },
    methods: {
      
    },
   
  }
</script>
<style>

</style>