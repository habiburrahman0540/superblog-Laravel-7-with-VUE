<template>
    <span id="">
         <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
               
                <ul class="cat">
                  <li v-for="(category,index) in allcategory"><i class="icon-angle-right"></i><a href="#">{{category.cat_name}}</a><span> (20)</span></li>
              
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  <li v-for="(post,index) in blogpost" v-if="index<2">
                    <img :src="`uploadimage/${post.photo}`" class="pull-left" alt="" width="50" height="50" />
                    <h6><router-link :to="`/singlepost/${post.id}`">{{post.title}}</router-link></h6>
                    <p v-html="$options.filters.shortlength(post.description,100,'')"></p>
                  </li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  <li><a href="#">Web design</a></li>
                  <li><a href="#">Trends</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Internet</a></li>
                  <li><a href="#">Tutorial</a></li>
                  <li><a href="#">Development</a></li>
                </ul>
              </div>
            </aside>
          </div>
    </span>
</template>
<script>
        export default {
        name:'sidebar',
        mounted(){
         
         return this.$store.dispatch('allcategories')
        } ,
        computed:{
         blogpost(){
        return this.$store.getters.getblogpost
      },
          allcategory(){
           return this.$store.getters.allcategory
          }
        },
        methods:{
          
        }
        }
</script>