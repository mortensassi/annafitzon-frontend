<template lang="pug">
    section.projects
      article.row.project.project--show(v-for="project in projects" )
        .col-xs-12.col-lg-4
          header.project__header.clearfix
            .pull-left
              h1 {{ project.title.rendered }}
            button.hidden-lg.pull-right(@click="selected = project.id") i
          .project__info(:aria-expanded="project.id == selected ? 'true' : 'false'")
            .project__content(v-html="project.content.rendered")
            footer.project__footer
            div –
            time(v-if="project.acf.project_year" v-bind:datetime="project.acf.project_year") {{ project.acf.project_year }}

        .col-xs-12.col-lg-8
          slick.slider(:ref="slick" v-bind:options="slickOptions")
            .slider__item(v-if="img !== false && img.url" v-for="img in project.acf")
              img.img-responsive(v-bind:src="img.url" v-bind:alt="img.alt")
</template>

<script>
  import slick from 'vue-slick'

  export default {
    name: 'listProjects',
    props: ['projects'],

    data () {
      return {
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
        },

        selected: undefined
      }
    },

    components: {
      'slick': slick
    }
  }
</script>
