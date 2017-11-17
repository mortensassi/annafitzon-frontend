import Vue from 'vue'
import Router from 'vue-router'
import Homepage from '@/components/pages/Homepage'
import Page from '@/components/pages/Page'
import NotFound from '@/components/pages/404'

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
      name: 'NotFound',
      path: '*',
      component: NotFound
    }
  ]
})
