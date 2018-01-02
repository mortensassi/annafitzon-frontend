<template lang="pug">
  header(role="banner")
    nav.navigation.navigation--main(aria-label="site")

      h1.logo
        router-link(to="/", @click.native="closeMenu")
          | Anna Fitzon
          br
          | Kommunikationsdesign

      button.visible-xs(:aria-expanded="menuOpen ? 'true' : 'false'", @click="toggleMenu")
        svgicon(:name="menuOpen ? 'icon_menu-close' : 'icon_menu'")

      ul.menu(:aria-expanded="menuOpen ? 'true' : 'false'")
        li.menu__item.menu__item--smile
          a(:aria-expanded="profileOpen ? 'true' : 'false' ", @click="toggleProfile") About
          .profile(:aria-expanded="profileOpen ? 'true' : 'false' ")
            img(src="static/anna-fitzon_portrait.jpg")
            p Kommunikationsdesignerin (BA) #[br] aus Düsseldorf.
            p Schwerpunkte: #[br] Corporate design & Editorial design

        li.menu__item.menu__item--mail
          a(title="Mail an Anna schreiben" href="mailto:info@annafitzon.de") info@annafitzon.de

        li.menu__item.menu__item--imprint

          router-link(to="impressum", @click.native="closeMenu") Impressum
</template>

<script>
  import '../../compiled-icons'

  export default {
    data () {
      return {
        menuOpen: false,
        profileOpen: false,
        props: ['menu']
      }
    },

    methods: {
      toggleMenu: function () {
        this.menuOpen = !this.menuOpen
        if (this.menuOpen === false) {
          this.profileOpen = false
        }
      },
      toggleProfile: function () {
        this.profileOpen = !this.profileOpen
      },
      closeMenu: function () {
        if (this.menuOpen === true) {
          this.menuOpen = !this.menuOpen
        }
      }
    }
  }
</script>
