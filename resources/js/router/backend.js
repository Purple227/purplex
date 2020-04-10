
//views userInterface
import Dashboard from '../components/backend-views/dashboard.vue';
import CreatePost from '../components/backend-views/post/create.vue';
import ListPosts from '../components/backend-views/post/index.vue';
import EditPost from '../components/backend-views/post/edit.vue';
import Tags from '../components/backend-views/tag.vue';
import About from '../components/backend-views/about.vue';
import EditUser from '../components/backend-views/user/edit-user.vue';
import UpdateSecurity from '../components/backend-views/user/update-security.vue';


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
    name:'list-tags',
    path: '/admin/tags',
    component: Tags
},

{
    name:'about',
    path: '/admin/about',
    component: About
},

{
    name:'edit-user',
    path: '/admin/user-edit',
    component: EditUser
},

{
    name:'update-security',
    path: '/admin/user-security',
    component: UpdateSecurity
},



];

export default routes;







































