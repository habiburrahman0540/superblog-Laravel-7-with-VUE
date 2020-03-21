import Axios from "axios"

export default{
    state:{
        category:[],
        post:[],
        blogpost:[],
    },
    getters:{
        getCategory(state){
            return state.category
        },
        getallpost(state){
            return state.post
        },
        getblogpost(state){
            return state.blogpost
        },
    },
    actions:{
        allCategory(context){
            axios.get('/category').
            then((response)=>{
                context.commit('categories',response.data.categories)
            })
        },
        allposts(context){
            axios.get('/post').
            then((response)=>{
                context.commit('posts',response.data.posts)
            })
        },
        allblogposts(context){
            axios.get('/blogpost').
            then((response)=>{
                context.commit('allblogpost',response.data.posts)
            })
        },

    },
    mutations:{
        categories(state,data){
            return state.category = data
        },
        posts(state,data){
            return state.post =data
        },
        allblogpost(state,data){
            return state.blogpost =data
        }
        },
    
}