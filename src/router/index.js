import Vue from 'vue'
import Router from 'vue-router'
import Homepage from '@/components/pages/Homepage.vue'
import Page from '@/components/pages/Page.vue'
import NotFound from '@/components/pages/404.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      name: 'Homepage',
      path: '/',
      component: Homepage
    },
    {
      name: 'Impressum',
      path: '/impressum',
      component: Page
    },
    {
      name: 'Datenschutz',
      path: '/datenschutz',
      component: Page
    },
    {
      name: 'NotFound',
      path: '*',
      component: NotFound
    }
  ]
})
