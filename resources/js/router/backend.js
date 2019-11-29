
//views userInterface
import Dashboard from '../components/backend-views/dashboard.vue';
import CreatePost from '../components/backend-views/post/create.vue';
import ListPosts from '../components/backend-views/post/index.vue';
import CreateProject from '../components/backend-views/project/create.vue';
import ListProjects from '../components/backend-views/project/index.vue';

import Testing from '../components/backend-views/testing.vue';

const routes = 
[

{ 
    name:'dashboard',
    path: '/admin/dashboard',
    component: Dashboard
},

{
    name:'list-posts',
    path: '/admin/posts',
    component: ListPosts
},

{ 
    name:'create-post',
    path: '/admin/posts/create',
    component: CreatePost
},

{
    name:'create-project',
    path: '/admin/projects/create',
    component: CreateProject
},

{
    name:'list-projects',
    path: '/admin/projects',
    component: ListProjects
},

{
    name:'testing',
    path: '/admin/testing',
    component: Testing
},


];

export default routes;







































