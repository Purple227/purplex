
//views userInterface
import Contact from '../components/frontend-views/contact.vue';
import Home from '../components/frontend-views/home.vue';
import About from '../components/frontend-views/about.vue';
import Portfolio from '../components/frontend-views/portfolio.vue';
import Blog from '../components/frontend-views/blog.vue';
import BlogPost from '../components/frontend-views/blog-post.vue';

const routes = 
[
{ 
    name:'home',
    path: '/',
    component: Home
},

{ 
    name:'contact',
    path: '/contact',
    component: Contact
},

{
    name:'about',
    path: '/about',
    component: About 
},

{
    name:'portfolio',
    path: '/portfolio',
    component: Portfolio 
},

{
    name:'blog',
    path: '/blog',
    component: Blog 
},

{
    name:'blog-post',
    path: '/blog/:slug',
    component: BlogPost
},


];

export default routes;







































