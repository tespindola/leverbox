<template>
    <v-container>
        <v-app-bar app dark>
            <v-app-bar-nav-icon @click="menu_drawer = !menu_drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>Leverbox</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-menu open-on-click right offset-y>
                <template v-slot:activator="{ on }">
                    <v-btn v-on="on" class="ml-2" icon>
                        <v-icon large>mdi-account-circle</v-icon>
                    </v-btn>
                </template>

                <v-list v-if="$login != true">
                    <v-list-item :to="{name: 'Inicio de sesion'}">
                        <v-list-item-title>Iniciar Sesion</v-list-item-title>
                    </v-list-item>
                    <v-list-item :to="{name: 'Registrarse'}">
                        <v-list-item-title>Registrarse</v-list-item-title>
                    </v-list-item>
                </v-list>
                <v-list v-else>
                    <v-list-item :to="{name: 'Solicitudes'}">
                        <v-list-item-title>Solicitudes</v-list-item-title>
                    </v-list-item>
                    <v-list-item @click="logout()">
                        <v-list-item-title>Salir</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>
        <v-navigation-drawer app v-model="menu_drawer" temporary dark  class="p-2">
            <v-row>
                <v-col cols="12" class="text-center mt-5 white--text">
                    <h1>{{ $route.name }}</h1>
                </v-col>
                <v-col cols="12">
                    <v-btn color="cyan darken-4 white--text" block :to="{ name: 'Inicio' }" exact="">
                        Inicio
                        <v-icon right>mdi-home</v-icon>
                    </v-btn>
                </v-col>
            </v-row>
        </v-navigation-drawer>
    </v-container>
</template>



<script>
import axios from 'axios';
import Vue from "vue";

export default {
    name: 'NavBar',
    data(){
        return {
            menu_drawer: false,
        }
    },
    methods:{
        async logout(){
            this.overlay = true;
            let resLogout = await axios.post('logout');
            Vue.prototype.$login = false;
            this.overlay = false;
            this.$router.push('/login');
        }
    }
}
</script>