<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Propiedades</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input
                                                    type="checkbox"
                                                    name="publicado"
                                                    :value="item.publicado"
                                                    :checked="item.publicado == true"
                                                    @change="updatePublicado"
                                                    >
                                            Publicado
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Titulo *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="titulo"
                                            placeholder="Enter Titulo *"
                                            :value="item.titulo"
                                            @input="updateTitulo"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripcion *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="descripcion"
                                            placeholder="Enter Descripcion *"
                                            :value="item.descripcion"
                                            @input="updateDescripcion"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <input
                                            type="file"
                                            class="form-control"
                                            @change="updateImagen"
                                            multiple="multiple"
                                    >
                                    <ul v-if="item.imagen || item.uploaded_imagen" class="list-unstyled">
                                        <li v-for="imagen in item.uploaded_imagen">
                                            {{ imagen.file_name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeUploadedImagen($event, imagen.id);"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                        <li v-for="(imagen, index) in item.imagen">
                                            {{ imagen.name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeImagen($event, index);"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="precio"
                                            placeholder="Enter Precio *"
                                            :value="item.precio"
                                            @input="updatePrecio"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="moneda">Moneda</label>
                                    <v-select
                                            name="moneda"
                                            label="moneda"
                                            @input="updateMoneda"
                                            :value="item.moneda"
                                            :options="monedasAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="barrio">Barrio *</label>
                                    <v-select
                                            name="barrio"
                                            label="barrio"
                                            @input="updateBarrio"
                                            :value="item.barrio"
                                            :options="barriosAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="operacion">Operacion</label>
                                    <v-select
                                            name="operacion"
                                            label="tipooperacion"
                                            @input="updateOperacion"
                                            :value="item.operacion"
                                            :options="tipooperacionsAll"
                                            />
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('PropiedadesSingle', ['item', 'loading', 'monedasAll', 'barriosAll', 'tipooperacionsAll']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('PropiedadesSingle', ['fetchData', 'updateData', 'resetState', 'setPublicado', 'setTitulo', 'setDescripcion', 'setImagen', 'destroyImagen', 'destroyUploadedImagen', 'setPrecio', 'setMoneda', 'setBarrio', 'setOperacion']),
        updatePublicado(e) {
            this.setPublicado(e.target.checked)
        },
        updateTitulo(e) {
            this.setTitulo(e.target.value)
        },
        updateDescripcion(e) {
            this.setDescripcion(e.target.value)
        },
        removeImagen(e, id) {
            this.$swal({
                title: 'Are you sure?',
                text: "To fully delete the file submit the form.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#dd4b39',
                focusCancel: true,
                reverseButtons: true
            }).then(result => {
                if (typeof result.dismiss === "undefined") {
                    this.destroyImagen(id);
                }
            })
        },
        updateImagen(e) {
            this.setImagen(e.target.files);
            this.$forceUpdate();
        },
        removeUploadedImagen (e, id) {
        this.$swal({
          title: 'Are you sure ? ',
          text: "To fully delete the file submit the form.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          confirmButtonColor: '#dd4b39',
          focusCancel: true,
          reverseButtons: true
        }).
        then(result => {
            if (typeof result.dismiss === "undefined") {
                this.destroyUploadedImagen(id);
            }
        })
        },
        updatePrecio(e) {
            this.setPrecio(e.target.value)
        },
        updateMoneda(value) {
            this.setMoneda(value)
        },
        updateBarrio(value) {
            this.setBarrio(value)
        },
        updateOperacion(value) {
            this.setOperacion(value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'propiedades.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
