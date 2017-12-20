import Vue from 'vue'

import  VueRouter from 'vue-router'

Vue.use(VueRouter);

import switching from './components/switching.vue';

const router = new VueRouter({
    routes: [
        {
            path: "/switching",
            component: switching
        }
    ]
})
export default router