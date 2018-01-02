<template lang="pug">
  #app
    .container-fluid
      a.sr-only(href="#main") Zum Hauptinhalt wechseln
      .row
        .col-xs-12.col-sm-4.col-md-3.fixed
          wpheader(v-bind="menu")
        main.col-xs-12.col-sm-8.col-md-9#main
          router-view
        back-to-top(text="Top")

</template>

<script>
  import wpheader from './components/global/Header'
  import BackToTop from './components/global/BackToTop'

  export default {
    name: 'app',

    data () {
      return {
        menu: {
          open: false
        }
      }
    },

    components: {
      wpheader,
      BackToTop
    }
  }
</script>

<style src="./assets/styles/main.scss" lang="scss"></style>
