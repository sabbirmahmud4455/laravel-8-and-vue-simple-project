  
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../pages/HomePage.vue'
import Categorys from '../pages/Categorys/index.vue'
import CategoryCreat from '../pages/Categorys/create.vue'
import CategoryEdit from '../pages/Categorys/edit.vue'
const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home',
        },
        {
            path: '/categorys',
            component: Categorys,
            name: 'categorys',
        },
        {
            path: '/categorys/create',
            component: CategoryCreat,
            name: 'categorys_create',
        },
        {
            path: '/categorys/edit/:id',
            component: CategoryEdit,
            name: 'categorys_edit'
        }
    ]
});

export default routes;