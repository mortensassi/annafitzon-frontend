<template lang="pug">
  #app
    .container-fluid
      a.sr-only(href="#main") Zum Hauptinhalt wechseln
      .row
        .col-xs-12.col-sm-4.col-md-3.fixed
          wpheader
        main.col-xs-12.col-sm-8.col-md-9#main
          router-view

</template>

<script>
  import wpheader from './components/global/Header.vue'

  export default {
    name: 'app',

    components: {
      wpheader
    }
  }
</script>

<style src="./sass/main.scss" lang="scss"></style>
