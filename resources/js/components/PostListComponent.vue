<template>
    <div v-if="!loading">
        <post-list
            @changePage="changePage"
            :posts="posts"
            :totalPages="totalPages"
            :key="'k' + currentPage"
            :currentPage="currentPage"
        ></post-list>
    </div>
    <div v-else>
        <div class="loader"></div>
    </div>
</template>

<script>
import PostModalComponent from "./PostModalComponent";
import PostListDefault from "./PostListDefaultComponent";
export default {
    components: {
        "modal-post": PostModalComponent,
        "post-list": PostListDefault
    },
    methods: {
        getPosts() {
            this.loading = true;
            fetch(`api/post?page=${this.currentPage}`)
                .then(response => response.json())
                .then(json => {
                    console.log("listo");
                    this.loading = false;
                    this.posts = json.data;
                    this.totalPages = json.last_page;
                    console.log(json);
                });
        },
        changePage(page) {
            this.currentPage = page;
            this.getPosts();
        }
    },
    created() {
        this.getPosts();
    },
    data() {
        return {
            loading: true,
            postSelected: "",
            posts: [],
            totalPages: 10,
            currentPage: 1
        };
    }
};
</script>

<style scoped>
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>
