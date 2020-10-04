<template>
    <v-app>
        <navbar/>
        <v-main>
            <router-view></router-view>
        </v-main>
        <!-- Este overlay se utiliza para verificar si el usuario que esta accediendo inicio sesion y cuando se actualice el dom se dejara de ejecutar (cuando en el route lo verifica) -->
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate color="dark" size="60"></v-progress-circular>
        </v-overlay>
    </v-app>
</template>

<script>

// Llamo al componente NavBar, que es el menu
import navbar from '@/view/layouts/NavBar';

export default {
    name: "App",
    components:{
        navbar
    },
    data(){
        return {
            overlay:true,
        };
    },
    updated(){
        this.overlay = false;
    }
}
</script>

<style>
    /* Importamos estilos personalizados */
    @import '../../../public/css/style.css';
</style>