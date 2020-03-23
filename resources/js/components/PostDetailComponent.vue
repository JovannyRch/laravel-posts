<template>
  <div v-if="post">
    <div class="card mt-3">
      <div class="card-header">
        <img :src="'/images/' + post.image.image" width="100px" height="100px" alt />
        <h4 class="card-title">{{ post.title }}</h4>
      </div>
      <div class="card-body">
        <p>{{post.content}}</p>
        <router-link
          class="btn btn-success"
          :to="{name: 'category', params:{id: post.category.id}}"
        >{{post.category.titulo}}</router-link>
      </div>
    </div>
  </div>
  <div v-else>
    <h5>Post no encontrado</h5>
  </div>
</template>

<script>
export default {
  methods: {
    getPost(id) {
      fetch(`/api/post/${id}`)
        .then(r => r.json())
        .then(json => {
          this.post = json;
          console.log(this.post);
        });
    }
  },
  created() {
    let id = this.$route.params.id;
    this.getPost(id);
  },
  data() {
    return {
      post: null
    };
  }
};
</script>

<style>
</style>