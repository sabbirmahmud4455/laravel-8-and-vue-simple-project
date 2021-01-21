  
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// home
import Home from '../pages/HomePage.vue'

//category
import Categorys from '../pages/Categorys/index.vue'
import CategoryCreat from '../pages/Categorys/create.vue'
import CategoryEdit from '../pages/Categorys/edit.vue'

//product
import products from '../pages/Prodect/index.vue'
import productsCreate from '../pages/Prodect/create.vue'
import productEdit from '../pages/Prodect/edit.vue'
import productView from '../pages/Prodect/view.vue'


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
        },
        {
            path: '/products',
            component: products,
            name: 'product-index'
        },
        {
            path: '/product/create',
            component: productsCreate,
            name: 'product-create'
        },
        {
            path: '/product/edit/:id',
            component: productEdit,
            name: 'product-edit'
        },
        {
            path: '/product/:id',
            component: productView,
            name: 'product-view'
        },
    ]
});

export default routes;