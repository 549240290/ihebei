import Main from '~/components/main'

const routes = [{
        path: '/',
        name: '_home',
        redirect: '/home',
        component: Main,
        meta: {
            hideInMenu: true,
            notCache: true
        },
        children: [{
                path: '/home',
                name: 'home',
                meta: {
                    hideInMenu: true,
                    title: '首页',
                    notCache: true,
                    icon: 'md-home'
                },
                component: resolve => require(['~/pages/home/Index'], resolve)
            },
            {
                path: '/article',
                name: 'article',
                component: resolve => require(['~/pages/article/Index'], resolve)
            },
            {
                path: '/categorys',
                name: 'categorys',
                component: resolve => require(['~/pages/categorys/Index'], resolve)
            },
            {
                path: '/links',
                name: 'links',
                component: resolve => require(['~/pages/links/Index.vue'], resolve)
            },
            {
                path: '/tags',
                name: 'tags',
                component: resolve => require(['~/pages/tag/Index'], resolve)
            }
        ]
    },


]

export default routes