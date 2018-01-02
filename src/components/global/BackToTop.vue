<template lang="pug">
    transition(name="back-to-top--fade")
      button.back-to-top(v-show="visible", @click="backToTop")
        svgicon(name="icon_arrow-up")
</template>

<script>
  import '../../compiled-icons'

  export default {
    name: 'BackToTop',
    props: {
      visibleOffset: {
        type: [String, Number],
        default: 400
      }
    },
    data () {
      return {
        visible: false
      }
    },
    created () {
      let catchScroll = () => {
        this.visible = (window.pageYOffset > parseInt(this.visibleOffset))
      }
      window.smoothScroll = () => {
        let currentScroll = document.documentElement.scrollTop || document.body.scrollTop
        if (currentScroll > 0) {
          window.requestAnimationFrame(window.smoothScroll)
          window.scrollTo(0, Math.floor(currentScroll - (currentScroll / 5)))
        }
      }
      window.onscroll = catchScroll
    },
    methods: {
      backToTop () {
        window.smoothScroll()
      }
    }
  }
</script>
