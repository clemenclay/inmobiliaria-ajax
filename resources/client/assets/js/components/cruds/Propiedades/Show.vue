<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Propiedades</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Publicado</th>
                                            <td>{{ item.publicado }}</td>
                                            </tr>
                                        <tr>
                                            <th>Titulo</th>
                                            <td>{{ item.titulo }}</td>
                                            </tr>
                                        <tr>
                                            <th>Descripcion</th>
                                            <td>{{ item.descripcion }}</td>
                                            </tr>
                                        <tr>
                                            <th>Imagen</th>
                                            <td v-html="item.imagen_link"></td>
                                            </tr>
                                        <tr>
                                            <th>Precio</th>
                                            <td>{{ item.precio }}</td>
                                            </tr>
                                        <tr>
                                            <th>Moneda</th>
                                            <td>
                                                <span class="label label-info" v-if="item.moneda !== null">
                                                    {{ item.moneda.moneda }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Barrio</th>
                                            <td>
                                                <span class="label label-info" v-if="item.barrio !== null">
                                                    {{ item.barrio.barrio }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Operacion</th>
                                            <td>
                                                <span class="label label-info" v-if="item.operacion !== null">
                                                    {{ item.operacion.tipooperacion }}
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('PropiedadesSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('PropiedadesSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
