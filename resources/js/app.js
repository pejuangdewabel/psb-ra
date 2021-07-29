/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Form from "vform";
window.Form = Form;

// load Data auto
let Fire = new Vue();
window.Fire = Fire;

// Import Alert
import Swal from "sweetalert2";
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;

// import VueProgressBar from "vue-progressbar";
// Vue.use(VueProgressBar, {
//     color: "rgb(143, 255, 199)",
//     failedColor: "red",
//     height: "130px"
// });

window.Toast = Toast;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component(
    "kelas-component",
    require("./components/admin/KelasComponent.vue").default
);
Vue.component(
    "tahun-component",
    require("./components/admin/TahunComponent.vue").default
);
Vue.component(
    "informasi-component",
    require("./components/admin/InformasiComponent.vue").default
);
Vue.component(
    "pendaftar-component",
    require("./components/admin/PendaftarComponent.vue").default
);
Vue.component(
    "kelulusan-component",
    require("./components/admin/KelulusanComponent.vue").default
);
Vue.component(
    "user-component",
    require("./components/admin/UserComponent.vue").default
);
Vue.component(
    "admin-component",
    require("./components/admin/AdminComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
