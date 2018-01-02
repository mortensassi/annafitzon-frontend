<template lang="pug">
  #page
    div.loading(:class="loading ? '' : 'loading--end'")
      -for ($i=0;$i<4;$i = $i + 1 )
        .loading__dot
    .page(:class="{'page--show': showPage}")
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
        post: [],
        loading: true,
        showPage: false
      }
    },

    created () {
      this.getPost()
    },

    updated () {
      this.showPage = true
    },

    methods: {
      getPost () {
        let path = this.$route.path
        axios.get(process.env.API_URL + '/wp-json/wp/v2/pages/?slug=' + path.replace(/^\/|\/$/g, ''))
          .then(response => {
            this.post = response.data[0]
            this.loading = false

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
