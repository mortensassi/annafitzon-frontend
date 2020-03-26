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
          .profile(:aria-expanded="profileOpen ? 'true' : 'false' " v-if="profileData")
            img(:src="profileData.profile_pic.url")
            .profile__desc(v-html="profileData.profile_desc")

        li.menu__item.menu__item--mail
          a(title="Mail an Anna schreiben" href="mailto:info@annafitzon.de") info@annafitzon.de

        li.menu__item.menu__item--imprint
          router-link(to="impressum", @click.native="closeMenu") Impressum

        li.menu__item.menu__item--privacy
          router-link(to="datenschutz", @click.native="closeMenu") Datenschutz
</template>

<script>
  import '../../compiled-icons'
  import axios from 'axios'

  export default {
    data () {
      return {
        menuOpen: false,
        profileOpen: false,
        profileData: {},
        props: ['menu']
      }
    },

    mounted () {
      this.getProfileData()
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
      },
      getProfileData () {
        axios.get(`${process.env.API_URL}/wp-json/acf/v3/options/general`)
          .then(res => {
            this.profileData = res.data.acf
          })
          .catch(e => {
            console.log(e)
          })
      }
    }
  }
</script>
