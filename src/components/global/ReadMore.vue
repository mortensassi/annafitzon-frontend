<template>
  <read-more more-str="read more" :text="msg" link="#" less-str="read less" :max-chars="50"></read-more>
</template>

<script>
  export default {
    data () {
      return {
        msg: project.content.rendered
      }
    },

    components: {
      'read-more': readMore
    }
  }
</script>

<style scoped>

</style>
