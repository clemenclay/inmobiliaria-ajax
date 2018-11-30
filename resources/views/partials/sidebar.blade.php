@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <li class="treeview" v-if="$can('user_management_access')">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('permission_access')">
                        <router-link :to="{ name: 'permissions.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.permissions.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('role_access')">
                        <router-link :to="{ name: 'roles.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('user_access')">
                        <router-link :to="{ name: 'users.index' }">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="treeview" v-if="$can('contact_management_access')">
                <a href="#">
                    <i class="fa fa-phone-square"></i>
                    <span>@lang('quickadmin.contact-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('contact_company_access')">
                        <router-link :to="{ name: 'contact_companies.index' }">
                            <i class="fa fa-building-o"></i>
                            <span>@lang('quickadmin.contact-companies.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('contact_access')">
                        <router-link :to="{ name: 'contacts.index' }">
                            <i class="fa fa-user-plus"></i>
                            <span>@lang('quickadmin.contacts.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li v-if="$can('propiedade_access')">
                <router-link :to="{ name: 'propiedades.index' }">
                    <i class="fa fa-building"></i>
                    <span>@lang('quickadmin.propiedades.title')</span>
                </router-link>
            </li>
            <li class="treeview" v-if="$can('detalles_propiedad_access')">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.detalles-propiedad.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('moneda_access')">
                        <router-link :to="{ name: 'monedas.index' }">
                            <i class="fa fa-dollar"></i>
                            <span>@lang('quickadmin.moneda.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('tipooperacion_access')">
                        <router-link :to="{ name: 'tipooperacions.index' }">
                            <i class="fa fa-align-justify"></i>
                            <span>@lang('quickadmin.tipooperacion.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('barrio_access')">
                        <router-link :to="{ name: 'barrios.index' }">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.barrio.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>

            <li>
                <router-link :to="{ name: 'auth.change_password' }">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </router-link>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
