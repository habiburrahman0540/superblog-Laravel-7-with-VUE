import AdminHome from './components/admin/AdminHome.vue'
import ex from './components/ExampleComponent.vue'
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New'
import editCategory from './components/admin/category/Edit'
import PostList from './components/admin/post/List'
import AddPost from './components/admin/post/New'
import editPost from './components/admin/post/Edit'
//frontend
import publicHome from './components/Public/PublicHome'
import publicblog from './components/Public/blog/BlogPost.vue'
import Singlepost from './components/Public/blog/SingleBlog.vue'
import PostCategory from './components/Public/blog/categorypost.vue'
export const routes = [
    {
        path: '/home',
        component: AdminHome
    },
    {
      path:'/categorylist',component: CategoryList
    },
    {
       path:'/add-category',component:AddCategory
    }, 
    {
      path:'/edit-category/:id',
      component:editCategory
   },
   {
     path:'/post-list',component: PostList
   },
   {
      path:'/add-post',component:AddPost
   }, 
   {
     path:'/edit-post/:postsid',
     component:editPost
  },
  {
    path:'/',
    component:publicHome
 },
 {
  path:'/blog',
  component:publicblog
},
{
  path:'/singlepost/:id',
  component:Singlepost
},
{
  path:'/postcategory/:id',
  component:PostCategory
},
]