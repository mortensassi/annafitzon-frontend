<template lang="pug">
  #homepage
    div.loading(:class="loading ? '' : 'loading--end'")
      -for ($i=0;$i<4;$i = $i + 1 )
        .loading__dot
    list-projects(:projects="projects")
</template>

<script>
  import axios from 'axios'
  import ListProjects from '../global/ListProjects.vue'

  export default {
    name: 'Homepage',
    data () {
      return {
        title: 'Anna Fitzon – Visuelle Kommunikation',
        projects: [],
        loading: true,
        slick: ''
      }
    },

    created () {
      this.getProjects()
      document.title = this.title
    },

    methods: {
      getProjects () {
        axios.get(process.env.API_URL + '/wp-json/wp/v2/projects')
          .then(response => {
            this.loading = false
            this.projects = response.data
          })
          .catch(e => {
            console.log(e)
          })
      }
    },

    components: {
      'list-projects': ListProjects
    }
  }
</script>
