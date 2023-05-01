import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'index',
            component: () => import('../views/main/Index.vue')
        },
        {
            path: '/products',
            name: 'product.index',
            component: () => import('../views/product/Index.vue')
        },
        {
            path: '/products/show/:id',
            name: 'product.show',
            component: () => import('../views/product/Show.vue')
        },
        {
            path: '/products/cart',
            name: 'cart.index',
            component: () => import('../views/product/Cart.vue')
        },
    ]
})

export default router;
