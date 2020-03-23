window.Vue = require("vue");
import VueRouter from "vue-router";
import PostListComponent from "../components/PostListComponent.vue";
import PostDetail from "../components/PostDetailComponent.vue";
import CategoryPosts from "../components/CategoryPostsComponent.vue";
import Contact from "../components/ContactComponent.vue";
import Categories from "../components/CategoriesComponent.vue";

Vue.use(VueRouter);
const router = new VueRouter({
    mode: "history",
    routes: [
        //  { path: "/", component: PostListComponent },
        { path: "/", component: PostListComponent, name: "list" },
        { path: "/detail/:id", component: PostDetail, name: "detail" },
        { path: "/category/:id", component: CategoryPosts, name: "category" },
        { path: "/categories", component: Categories, name: "categories" },
        { path: "/contact", component: Contact, name: "contact" }
    ]
});

export default router;
