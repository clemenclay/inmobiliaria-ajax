<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Galeria</h1>
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
                                    <label for="nombre">Nombre</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="nombre"
                                            placeholder="Enter Nombre"
                                            :value="item.nombre"
                                            @input="updateNombre"
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
        ...mapGetters('GaleriaSingle', ['item', 'loading']),
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
        ...mapActions('GaleriaSingle', ['fetchData', 'updateData', 'resetState', 'setNombre', 'setImagen', 'destroyImagen', 'destroyUploadedImagen']),
        updateNombre(e) {
            this.setNombre(e.target.value)
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
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'galerias.index' })
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
