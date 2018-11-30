import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import ContactCompaniesIndex from './modules/ContactCompanies'
import ContactCompaniesSingle from './modules/ContactCompanies/single'
import ContactsIndex from './modules/Contacts'
import ContactsSingle from './modules/Contacts/single'
import PropiedadesIndex from './modules/Propiedades'
import PropiedadesSingle from './modules/Propiedades/single'
import MonedasIndex from './modules/Monedas'
import MonedasSingle from './modules/Monedas/single'
import TipooperacionsIndex from './modules/Tipooperacions'
import TipooperacionsSingle from './modules/Tipooperacions/single'
import BarriosIndex from './modules/Barrios'
import BarriosSingle from './modules/Barrios/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
        ContactCompaniesIndex,
        ContactCompaniesSingle,
        ContactsIndex,
        ContactsSingle,
        PropiedadesIndex,
        PropiedadesSingle,
        MonedasIndex,
        MonedasSingle,
        TipooperacionsIndex,
        TipooperacionsSingle,
        BarriosIndex,
        BarriosSingle,
    },
    strict: debug,
})
