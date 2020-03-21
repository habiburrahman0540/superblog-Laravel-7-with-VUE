import Axios from "axios"

export default{
    state:{
        category:[],
        post:[],
        blogpost:[],
        singlepost:[],
        allcategory:[],
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
        getsinglepost(state){
            return state.singlepost
        },
        allcategory(state){
            return state.allcategory
        }
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
        getpostbyid(context,payload){
            axios.get('/singlepost/'+payload).then((response)=>{
                context.commit('singlepost',response.data.post)
            })
        },
        allcategories(context){
            axios.get('/allcategory/').
            then((response)=>{
                context.commit('allcategories',response.data.allcategory)
            })
        }

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
        },
        singlepost(state,payload){
            return state.singlepost = payload
        },
        allcategories(state,payload){
            return state.allcategory = payload
        }
        }
        
    
}