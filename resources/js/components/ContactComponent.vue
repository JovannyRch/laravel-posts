<template>
    <div class="row">
        <div class="col-2"></div>
        <div class="card col-8">
            <div class="card-header">
                <img
                    src="/images/1584811555.png"
                    width="100px"
                    class="mx-auto d-block"
                />
            </div>
            <div class="card-body">
                <h4 class="card-title">Contacto</h4>

                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nombre</div>
                    </div>
                    <input
                        type="text"
                        class="form-control"
                        id="nombre"
                        placeholder="Escribe aquí tu nombre"
                        v-model="nombre"
                    />
                </div>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Apellido</div>
                    </div>
                    <input
                        type="text"
                        class="form-control"
                        id="apellido"
                        placeholder="Escribe aquí tu apellido"
                        v-model="apellido"
                    />
                </div>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Email</div>
                    </div>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Escribe aquí tu email"
                        v-model="email"
                    />
                </div>
                <div class="form-group">
                    <label for="comentarios">Comentarios</label>
                    <textarea
                        class="form-control"
                        v-model="comentarios"
                        name="comentarios"
                        id="comentarios"
                        rows="3"
                    ></textarea>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="button" class="btn btn-primary float-right">
                    Enviar
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nombre: "",
            apellido: "",
            email: "",
            comentarios: ""
        };
    }
};
</script>

<style></style>
