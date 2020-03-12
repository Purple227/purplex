
//views userInterface
import Dashboard from '../components/backend-views/dashboard.vue';
import CreatePost from '../components/backend-views/post/create.vue';
import ListPosts from '../components/backend-views/post/index.vue';
import EditPost from '../components/backend-views/post/edit.vue'
import Testing from '../components/backend-views/testing.vue';

const routes = 
[

{ 
    name:'dashboard',
    path: '/admin/dashboard',
    component: Dashboard
},

{ 
    name:'create-post',
    path: '/admin/posts/create',
    component: CreatePost
},

{
    name:'list-posts',
    path: '/admin/posts',
    component: ListPosts
},

{
    name:'edit-post',
    path: '/admin/post/edit/:id',
    component: EditPost
},

{
    name:'testing',
    path: '/admin/testing',
    component: Testing
},


];

export default routes;







































