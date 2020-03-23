<template>
    <div>
        <h3>Categorias</h3>
        <div class="row">
            <div
                class="card col-3 m-3"
                v-for="(c, index) in categorias"
                :key="index"
            >
                <div class="card-header">
                    <img
                        src="/images/logo.png"
                        alt=""
                        width="100px"
                        class="mx-auto d-block"
                        srcset=""
                    />
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        <router-link
                            class="list-group-item list-group-item-action flex-column align-items-start"
                            :to="{ name: 'category', params: { id: c.id } }"
                        >
                            {{ c.titulo }}
                        </router-link>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.getCategorias();
    },
    data() {
        return {
            categorias: []
        };
    },
    methods: {
        getCategorias() {
            fetch("/api/category/all")
                .then(r => r.json())
                .then(json => (this.categorias = json));
        }
    }
};
</script>

<style></style>
