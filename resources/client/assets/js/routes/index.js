import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import ContactCompaniesIndex from '../components/cruds/ContactCompanies/Index.vue'
import ContactCompaniesCreate from '../components/cruds/ContactCompanies/Create.vue'
import ContactCompaniesShow from '../components/cruds/ContactCompanies/Show.vue'
import ContactCompaniesEdit from '../components/cruds/ContactCompanies/Edit.vue'
import ContactsIndex from '../components/cruds/Contacts/Index.vue'
import ContactsCreate from '../components/cruds/Contacts/Create.vue'
import ContactsShow from '../components/cruds/Contacts/Show.vue'
import ContactsEdit from '../components/cruds/Contacts/Edit.vue'
import PropiedadesIndex from '../components/cruds/Propiedades/Index.vue'
import PropiedadesCreate from '../components/cruds/Propiedades/Create.vue'
import PropiedadesShow from '../components/cruds/Propiedades/Show.vue'
import PropiedadesEdit from '../components/cruds/Propiedades/Edit.vue'
import MonedasIndex from '../components/cruds/Monedas/Index.vue'
import MonedasCreate from '../components/cruds/Monedas/Create.vue'
import MonedasShow from '../components/cruds/Monedas/Show.vue'
import MonedasEdit from '../components/cruds/Monedas/Edit.vue'
import TipooperacionsIndex from '../components/cruds/Tipooperacions/Index.vue'
import TipooperacionsCreate from '../components/cruds/Tipooperacions/Create.vue'
import TipooperacionsShow from '../components/cruds/Tipooperacions/Show.vue'
import TipooperacionsEdit from '../components/cruds/Tipooperacions/Edit.vue'
import BarriosIndex from '../components/cruds/Barrios/Index.vue'
import BarriosCreate from '../components/cruds/Barrios/Create.vue'
import BarriosShow from '../components/cruds/Barrios/Show.vue'
import BarriosEdit from '../components/cruds/Barrios/Edit.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/contact-companies', component: ContactCompaniesIndex, name: 'contact_companies.index' },
    { path: '/contact-companies/create', component: ContactCompaniesCreate, name: 'contact_companies.create' },
    { path: '/contact-companies/:id', component: ContactCompaniesShow, name: 'contact_companies.show' },
    { path: '/contact-companies/:id/edit', component: ContactCompaniesEdit, name: 'contact_companies.edit' },
    { path: '/contacts', component: ContactsIndex, name: 'contacts.index' },
    { path: '/contacts/create', component: ContactsCreate, name: 'contacts.create' },
    { path: '/contacts/:id', component: ContactsShow, name: 'contacts.show' },
    { path: '/contacts/:id/edit', component: ContactsEdit, name: 'contacts.edit' },
    { path: '/propiedades', component: PropiedadesIndex, name: 'propiedades.index' },
    { path: '/propiedades/create', component: PropiedadesCreate, name: 'propiedades.create' },
    { path: '/propiedades/:id', component: PropiedadesShow, name: 'propiedades.show' },
    { path: '/propiedades/:id/edit', component: PropiedadesEdit, name: 'propiedades.edit' },
    { path: '/monedas', component: MonedasIndex, name: 'monedas.index' },
    { path: '/monedas/create', component: MonedasCreate, name: 'monedas.create' },
    { path: '/monedas/:id', component: MonedasShow, name: 'monedas.show' },
    { path: '/monedas/:id/edit', component: MonedasEdit, name: 'monedas.edit' },
    { path: '/tipooperacions', component: TipooperacionsIndex, name: 'tipooperacions.index' },
    { path: '/tipooperacions/create', component: TipooperacionsCreate, name: 'tipooperacions.create' },
    { path: '/tipooperacions/:id', component: TipooperacionsShow, name: 'tipooperacions.show' },
    { path: '/tipooperacions/:id/edit', component: TipooperacionsEdit, name: 'tipooperacions.edit' },
    { path: '/barrios', component: BarriosIndex, name: 'barrios.index' },
    { path: '/barrios/create', component: BarriosCreate, name: 'barrios.create' },
    { path: '/barrios/:id', component: BarriosShow, name: 'barrios.show' },
    { path: '/barrios/:id/edit', component: BarriosEdit, name: 'barrios.edit' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
