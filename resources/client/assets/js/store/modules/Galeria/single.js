function initialState() {
    return {
        item: {
            id: null,
            nombre: null,
            imagen: [],
            uploaded_imagen: [],
        },
        
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    
    
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

            params.set('uploaded_imagen', state.item.uploaded_imagen.map(o => o['id']))

            axios.post('/api/v1/galerias', params)
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

            params.set('uploaded_imagen', state.item.uploaded_imagen.map(o => o['id']))

            axios.post('/api/v1/galerias/' + state.item.id, params)
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
        axios.get('/api/v1/galerias/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setNombre({ commit }, value) {
        commit('setNombre', value)
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
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setNombre(state, value) {
        state.item.nombre = value
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
