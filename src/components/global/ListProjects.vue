<template lang="pug">
    section.projects
      article.row.project(v-for="project in projects", :class="{'project--show': showProjects}")
        .col-xs-12.col-lg-4
          header.project__header.clearfix
            .pull-left
              h1 {{ project.title.rendered }}
              h2 {{ project.category_names[0] }}
            button.hidden-lg.pull-right(@click.prevent="activeProject(project.id)") i

          .project__info(:aria-expanded="visibleProjectText === project.id ? 'true' : 'false'")
            .project__content.hidden-lg(v-html="project.content.rendered")
            read-more.project__content.visible-lg(more-str="[...]" v-bind:text="project.content.rendered" link="#" less-str="[...]" v-bind:max-chars="300")
            footer.project__footer
            div –
            time(v-if="project.acf.project_year" v-bind:datetime="project.acf.project_year") {{ project.acf.project_year }}
            dl
              dt(v-for="tag in project.tag_names") {{ tag }}

        .col-xs-12.col-lg-8
          slick.slider(:ref="slick" :options="slickOptions")
            .slider__item(v-if="img !== false && img.url" v-for="img in project.acf.images")
              // Animated GIFS have to be embedded in full-size to prevent being converted to static ones.
              clazy-load(v-if="img.mime_type === 'image/gif'", :src="img.url")
                img.img-responsive(:src="img.url")
              clazy-load(v-else, :src="img.url")
                img.img-responsive(:src="img.url", :srcset="getSrcSet(img)", :alt="img.alt")
</template>

<script>
  import slick from 'vue-slick'

  export default {
    name: 'listProjects',
    props: ['projects'],

    data () {
      return {
        visibleProjectText: null,
        showProjects: false,
        readMore: false,
        fullProjectText: null,
        slick: '',
        slickOptions: {
          arrows: false,
          dots: true,
          mobileFirst: true,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                fade: true,
                arrows: true
              }
            }
          ]
        }
      }
    },

    updated () {
      this.showProjects = true
    },

    components: {
      'slick': slick
    },

    methods: {
      getSrcSet (img) {
        return `${img.sizes.medium_large} ${img.sizes['medium_large-width']}w, ${img.sizes.large} ${img.sizes['large-width']}w, ${img.url} 1200w`
      },
      activeProject (projID) {
        this.visibleProjectText = this.visibleProjectText === projID ? null : projID
      }
    }
  }
</script>
