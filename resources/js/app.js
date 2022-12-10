import './bootstrap';
import 'mdi-icons/css/materialdesignicons.min.css';
import 'font-awesome/css/font-awesome.min.css'
import 'jquery/dist/jquery.min.js'
import 'datatables.net/js/jquery.dataTables.min.js'
import 'datatables.net-dt/css/jquery.dataTables.min.css'
import 'datatables.net-dt/js/dataTables.dataTables.min.js'
import 'datatables.net-buttons/js/dataTables.buttons.min.js'
import 'datatables.net-buttons/js/buttons.html5.min.js'
import DataTables from 'datatables.net-dt'
import 'datatables.net-buttons-dt/css/buttons.dataTables.min.css'
import 'datatables.net-buttons-dt/js/buttons.dataTables.js'
import jQuery from 'jquery'
import VueSweetalert2 from 'vue-sweetalert2';
import VueSocialSharing from 'vue-social-sharing';
import Swal from 'sweetalert2';
import '../sass/app.scss'
import Router from '@/router'
import store from '@/store'

import { createApp } from 'vue/dist/vue.esm-bundler';

const app = createApp({})
app.use(Router)
app.use(store)
app.use(VueSweetalert2)
app.use(VueSocialSharing)
app.mount('#app')