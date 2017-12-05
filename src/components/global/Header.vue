<template lang="pug">
  header(role="banner")
    nav.navigation.navigation--main(aria-label="site")

      h1.logo
        a(href="/#/")
          | Anna Fitzon
          br
          | Kommunikationsdesign

      button.visible-xs(aria-expanded="false", @click="toggleMenu")
        svgicon(name="icon_menu")

      ul.menu(:aria-expanded="menuOpen ? 'true' : 'false' ")
        li.menu__item.menu__item--smile
          a#aboutTrigger(aria-expanded="false") About
          .profile
            img

        li.menu__item.menu__item--mail
          a(title="Mail an Anna schreiben") info@annafitzon.de

        li.menu__item.menu__item--imprint
          a(title="Zum Impressum wechseln" href="/#/impressum") Impressum
</template>

<script>
  import '../../compiled-icons'

  export default {
    data () {
      return {
        menuOpen: false
      }
    },

    methods: {
      toggleMenu: function () {
        this.menuOpen = !this.menuOpen
      }
    }
  }
</script>
