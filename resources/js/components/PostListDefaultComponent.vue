<template>
    <div>
        <router-link class="btn btn-success" to="/contact"
            >Contacto</router-link
        >
        <br />
        <div class="card mt-3" v-for="(p, index) in posts" :key="index">
            <img :src="'/images/' + p.image" width="100px" height="100px" alt />
            <div class="card-body">
                <h4 class="card-title">{{ p.title }}</h4>
                <button
                    type="button"
                    class="btn btn-primary btn-lg"
                    @click="postSelected = p"
                >
                    Ver resumen
                </button>
                <router-link :to="{ name: 'detail', params: { id: p.id } }"
                    >Detalles</router-link
                >
            </div>
        </div>
        <modal-post :post="postSelected"></modal-post>

        <v-pagination
            v-model="currentPageChido"
            :page-count="totalPages"
            :classes="bootstrapPaginationClasses"
            :labels="paginationAnchorTexts"
        ></v-pagination>
    </div>
</template>

<script>
import vPagination from "vue-plain-pagination";
import PostModalComponent from "./PostModalComponent";
export default {
    components: { vPagination, "modal-post": PostModalComponent },
    props: ["posts", "totalPages", "currentPage"],
    watch: {
        currentPageChido: function(newVal, oldVal) {
            console.log("Pagina actual", newVal);
            this.$emit("changePage", newVal);
        }
    },
    created() {
        //this.currentPage = this.currentPageInit;
    },
    data() {
        return {
            currentPageChido: this.currentPage,
            postSelected: null,
            bootstrapPaginationClasses: {
                ul: "pagination",
                li: "page-item",
                liActive: "active",
                liDisable: "disabled",
                button: "page-link"
            },
            paginationAnchorTexts: {
                first: "",
                prev: "&laquo",
                next: "&raquo",
                last: ""
            }
        };
    }
};
</script>

<style></style>
