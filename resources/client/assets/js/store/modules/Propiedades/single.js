function initialState() {
    return {
        item: {
            id: null,
            publicado: false,
            titulo: null,
            descripcion: null,
            imagen: [],
            uploaded_imagen: [],
            precio: null,
            moneda: null,
            barrio: null,
            operacion: null,
        },
        monedasAll: [],
        barriosAll: [],
        tipooperacionsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    monedasAll: state => state.monedasAll,
    barriosAll: state => state.barriosAll,
    tipooperacionsAll: state => state.tipooperacionsAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            params.set('publicado', state.item.publicado ? 1 : 0)
            params.set('uploaded_imagen', state.item.uploaded_imagen.map(o => o['id']))
            if (_.isEmpty(state.item.moneda)) {
                params.set('moneda_id', '')
            } else {
                params.set('moneda_id', state.item.moneda.id)
            }
            if (_.isEmpty(state.item.barrio)) {
                params.set('barrio_id', '')
            } else {
                params.set('barrio_id', state.item.barrio.id)
            }
            if (_.isEmpty(state.item.operacion)) {
                params.set('operacion_id', '')
            } else {
                params.set('operacion_id', state.item.operacion.id)
            }

            axios.post('/api/v1/propiedades', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            params.set('publicado', state.item.publicado ? 1 : 0)
            params.set('uploaded_imagen', state.item.uploaded_imagen.map(o => o['id']))
            if (_.isEmpty(state.item.moneda)) {
                params.set('moneda_id', '')
            } else {
                params.set('moneda_id', state.item.moneda.id)
            }
            if (_.isEmpty(state.item.barrio)) {
                params.set('barrio_id', '')
            } else {
                params.set('barrio_id', state.item.barrio.id)
            }
            if (_.isEmpty(state.item.operacion)) {
                params.set('operacion_id', '')
            } else {
                params.set('operacion_id', state.item.operacion.id)
            }

            axios.post('/api/v1/propiedades/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/propiedades/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchMonedasAll')
    dispatch('fetchBarriosAll')
    dispatch('fetchTipooperacionsAll')
    },
    fetchMonedasAll({ commit }) {
        axios.get('/api/v1/monedas')
            .then(response => {
                commit('setMonedasAll', response.data.data)
            })
    },
    fetchBarriosAll({ commit }) {
        axios.get('/api/v1/barrios')
            .then(response => {
                commit('setBarriosAll', response.data.data)
            })
    },
    fetchTipooperacionsAll({ commit }) {
        axios.get('/api/v1/tipooperacions')
            .then(response => {
                commit('setTipooperacionsAll', response.data.data)
            })
    },
    setPublicado({ commit }, value) {
        commit('setPublicado', value)
    },
    setTitulo({ commit }, value) {
        commit('setTitulo', value)
    },
    setDescripcion({ commit }, value) {
        commit('setDescripcion', value)
    },
    setImagen({ commit }, value) {
        commit('setImagen', value)
    },
    destroyImagen({ commit }, value) {
        commit('destroyImagen', value)
    },
    destroyUploadedImagen({ commit }, value) {
        commit('destroyUploadedImagen', value)
    },
    setPrecio({ commit }, value) {
        commit('setPrecio', value)
    },
    setMoneda({ commit }, value) {
        commit('setMoneda', value)
    },
    setBarrio({ commit }, value) {
        commit('setBarrio', value)
    },
    setOperacion({ commit }, value) {
        commit('setOperacion', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setPublicado(state, value) {
        state.item.publicado = value
    },
    setTitulo(state, value) {
        state.item.titulo = value
    },
    setDescripcion(state, value) {
        state.item.descripcion = value
    },
    setImagen(state, value) {
        for (let i in value) {
            let imagen = value[i];
            if (typeof imagen === "object") {
                state.item.imagen.push(imagen);
            }
        }
    },
    destroyImagen(state, value) {
        for (let i in state.item.imagen) {
            if (i == value) {
                state.item.imagen.splice(i, 1);
            }
        }
    },
    destroyUploadedImagen(state, value) {
        for (let i in state.item.uploaded_imagen) {
            let data = state.item.uploaded_imagen[i];
            if (data.id === value) {
                state.item.uploaded_imagen.splice(i, 1);
            }
        }
    },
    setPrecio(state, value) {
        state.item.precio = value
    },
    setMoneda(state, value) {
        state.item.moneda = value
    },
    setBarrio(state, value) {
        state.item.barrio = value
    },
    setOperacion(state, value) {
        state.item.operacion = value
    },
    setMonedasAll(state, value) {
        state.monedasAll = value
    },
    setBarriosAll(state, value) {
        state.barriosAll = value
    },
    setTipooperacionsAll(state, value) {
        state.tipooperacionsAll = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
