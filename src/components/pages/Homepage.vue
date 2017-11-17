<template lang="pug">
  list-projects(v-bind:projects="projects")
</template>

<script>
  import axios from 'axios'
  import ListProjects from '../global/ListProjects.vue'

  export default {
    name: 'Homepage',
    data () {
      return {
        projects: [],
        category: []
      }
    },

    created () {
      this.getProjects()
    },

    methods: {
      getProjects () {
        axios.get(process.env.API_URL + '/wp-json/wp/v2/projects')
          .then(response => {
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
