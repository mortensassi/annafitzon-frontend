// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import * as svgicon from 'vue-svgicon'
import ReadMore from 'vue-read-more'
import IntersectionObserver from 'intersection-observer'
import VueClazyLoad from 'vue-clazy-load'

Vue.config.productionTip = false

Vue.use(IntersectionObserver)bre
Vue.use(VueClazyLoad)

Vue.use(svgicon, {
  tagName: 'svgicon'
})

Vue.use(ReadMore)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
