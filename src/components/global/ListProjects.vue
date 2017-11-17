<template lang="pug">
    section.projects
      article.row.project.project--show(v-for="project in projects" )
        .col-xs-12.col-lg-4
          header.project__header.clearfix
            .pull-left
              h1 {{ project.title.rendered }}
              h2 {{ project.acf.category }}
            button.hidden-lg.pull-right i
          .project__info
            .project__content(v-html="project.content.rendered")
            footer.project__footer
            div –
            time(:datetime="project.acf.project_year") {{ project.acf.project_year }}

        .col-xs-12.col-lg-8
          .slider
            .slider__item(v-for="(item, index) in project.acf")
              img(v-bind:src="item.url" v-bind:alt="index")



</template>

<script>
  export default {
    name: 'listProjects',
    props: ['projects']
  }
</script>
