require('./bootstrap');
import Vue from 'vue';
import Vuesax from 'vuesax';
import VueRouter from 'vue-router';
import 'vuesax/dist/vuesax.css'
import VueCarousel from 'vue-carousel';
import 'material-icons/iconfont/material-icons.css';

Vue.use(VueRouter);
Vue.use(Vuesax);
Vue.use(VueCarousel);

import Navigate from './components/navigation'
import Store from './components/store'
import Signin from './components/signin'
import Checkout from './components/checkout'

const router = new VueRouter({
    mode : 'history',
    routes: [
        {path:'/',name:'navigation',component:Navigate},
        {path:'/store',name:'store',component:Store},
        {path:'/signin',name:'signin',component:Signin},
        {path:'/checkout',name:'checkout',component:Checkout},

    ]
})

const app = new Vue({
    el:'#app',
    components:{Navigate},
    router
});

router.push('/navigation').catch(err => {})