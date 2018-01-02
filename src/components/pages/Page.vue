<template lang="pug">
  #page
    single-post(:post="post")
</template>

<script>
  import axios from 'axios'
  import SinglePost from '../global/SinglePost.vue'

  export default {
    name: 'Page',
    data () {
      return {
        title: '',
        post: []
      }
    },

    created () {
      this.getPost()
    },

    methods: {
      getPost () {
        let path = this.$route.path
        axios.get(process.env.API_URL + '/wp-json/wp/v2/pages/?slug=' + path.replace(/^\/|\/$/g, ''))
          .then(response => {
            this.post = response.data[0]

            if (this.post === undefined) {
              this.$router.push({name: 'NotFound'})
            }
            document.title = this.post.title.rendered
          })
          .catch(e => {
            console.log(e)
          })
      }
    },

    components: {
      'single-post': SinglePost
    }
  }
</script>
