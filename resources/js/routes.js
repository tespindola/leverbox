import Vue from "vue";
import VueRouter from "vue-router";
import axios from "axios";

// Vistas publicas
import Inicio from '@/view/web/Inicio';/* Creacion de solicitud */
import Login from '@/view/web/Login';/* Inicio de sesion */
import Register from '@/view/web/Register';/* Registro de nuevo usuario */
import AccessDenied from '@/view/web/AccessDenied'; /* Si no esta loggeado le se manda esta vista */

// Vistas loggeado
import Solicitudes from '@/view/admin/Solicitudes';/* Listado de solicitudes */

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes:[
        {
            path: "/",
            name: "Inicio",
            component: Inicio
        },
        {
            path: "/Login",
            name: "Inicio de sesion",
            component: Login
        },
        {
            path: "/Registrarse",
            name: "Registrarse",
            component: Register
        },
        {
            path: "/AccessDenied",
            name: "Acceso denegado",
            component: AccessDenied
        },
        {
            path: "/Solicitudes",
            name: "Solicitudes",
            component: Solicitudes,
            meta: {
                login:true,
            }
        },
    ]
});

// La funcion beforeEach se ejecuta cada vez que se cambie la ruta, esto nos sirve para verificar si la ruta que se desea visualizar tiene alguna condicion o restriccion para poder acceder a ella, esta restriccion se declara en el parametro meta.
router.beforeEach(async (to, from, next) => {
    let meta_login = to.matched.some(record => record.meta.login);
    let login = Vue.prototype.$login;

    // Consultamos si la variable global login esta definida, ya que si no esta definida significa que no se verifico si el usuario esta loggeado, entonces consultamos al backend si hay una sesion iniciada
    if(login == undefined){
        let resUserLogin = await axios.post("checkLogin");
        login = resUserLogin.data.login;
        Vue.prototype.$login = login;
    }
    if (meta_login == true) {
        if(login == true){
            next();
        }else{
            next("AccessDenied");    
        }
    } else {
        next();
    }
});

export default router;