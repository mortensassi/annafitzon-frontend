<template lang="pug">
  .single-wrap
    article
      h1 {{ post.title.rendered }}
      div(v-html="post.content.rendered")
</template>

<script>
  export default {
    props: ['post']
  }
</script>
