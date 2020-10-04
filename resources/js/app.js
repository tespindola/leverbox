/*
    Lo que hago aca es hacer que todo el funcionamiento del frontend pase por Vue.js, dejando solamente en el backend Laravel para conexiones con la base de datos, Auth, etc.
    Es como la estructura de Vue CLI.

 */
import Vuetify from "vuetify";
import Routes from "@/routes.js";
import Index from "@/view/Index";
import Vue from "vue";
import es from "vuetify/es5/locale/es";
import axios from "axios";

// Renderizamos el framework Vuetify (Doc: https://vuetifyjs.com/en/), que es un framework para estilos css, no utilizo bootstrap por que en temas de documentacion, compatibilidad y diseño me parece mejor Vuetify
Vue.use(Vuetify);

// Defino la variable global Login utilizando prototype (No utilizo Vuex en este caso para que sea mas dinamico el sistema)
Vue.prototype.$login = undefined;

// Definimos las url para la conexion con el backend. Uso axios para las peticiones HTTP y le paso el token generado en el head de la vista views/index.blade.php
let getUrl = window.location;
let baseUrl = getUrl .protocol + "//" + getUrl.host;
axios.defaults.baseURL = baseUrl + '/server/';
let token = document.head.querySelector('meta[name="csrf-token"]');

if(token){
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : token.content,
    };
}else{
    console.log('Token is not defined');
}
axios.defaults.headers.common['Accept'] = 'application/json'; // Declaramos que se acepta formato JSON

const app = new Vue({
    el: "#app",
    vuetify: new Vuetify({
        lang: {
            locales: { es },
            current: "es"
        }
    }),
    render: h => h(Index),
    router: Routes,
});

export default app;
