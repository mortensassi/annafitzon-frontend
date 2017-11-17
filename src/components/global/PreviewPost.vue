<template lang="pug">
  .preview-post
    h2.post-title.title.is-3 {{post.title.rendered}}
    .post-excerpt(v-html="post.excerpt.rendered")
    p
      router-link.read-more(:to="{ name:'post', params: {id: post.id, postSlug: post.slug} }") Read More
    hr
</template>

<script>
  export default {
    props: ['post']
  }
</script>
