<template>
    <div v-if="!loading || totalPages > 0">
        <h1>{{ category.titulo }}</h1>
        <post-list
            @changePage="changePage"
            :posts="posts"
            :totalPages="totalPages"
            :key="currentPage"
            :currentPage="currentPage"
        ></post-list>
    </div>
    <div v-else>Cargando</div>
</template>

<script>
import PostListDefault from "./PostListDefaultComponent.vue";

export default {
    components: {
        "post-list": PostListDefault
    },
    created() {
        this.category_id = this.$route.params.id;
        this.getPosts(this.category_id);
    },

    methods: {
        changePage(val) {
            this.currentPage = val;
            this.getPosts(this.category_id);
        },
        getPosts(category_id) {
            this.loading = true;
            fetch(`/api/post/${category_id}/category?page=${this.currentPage}`)
                .then(r => r.json())
                .then(json => {
                    this.posts = json.posts.data;
                    this.category = json.category;
                    this.loading = false;
                    this.totalPages = json.posts.last_page;
                });
        }
    },
    data() {
        return {
            category: null,
            posts: [],
            loading: true,
            currentPage: 1,
            totalPages: 0,
            category_id: 1
        };
    }
};
</script>

<style></style>
