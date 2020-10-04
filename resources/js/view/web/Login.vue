<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="6">
                <v-card elevation="16">
                    <v-card-title class="text-center">
                        Iniciar Sesion
                    </v-card-title>
                    <v-divider class="ma-0"></v-divider>
                    <v-card-text>
                        <v-text-field label="Email" prepend-icon="mdi-account" outlined type="email" v-model="email" required dense></v-text-field>
                        <v-text-field label="Contraseña" prepend-icon="mdi-lock" outlined type="password" v-model="password" required @keyup.enter="verificar()" dense></v-text-field>
                        <v-alert dense outlined :type="tipo_alert" v-if="alert == true">
                            {{ msg }}
                        </v-alert>
                    </v-card-text>
                    <v-divider class="ma-0"></v-divider>
                    <v-card-actions>
                        <v-btn large="" color="success" type="button" @click="verificar()">Acceder</v-btn>
                        <v-btn small color="info" outlined="" :to="{name:'Registrarse'}">¿No tenes cuenta?</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate color="dark" size="60"></v-progress-circular>
        </v-overlay>
    </v-container>
</template>

<script>
import Vue from 'vue';
import axios from 'axios';

export default {
    data(){
        return {
            email:null,
            password:null,
            alert:false,
            msg:null,
            tipo_alert:'error',
            overlay:false
        }
    },
    methods: {
        verificar(){
            if((this.email == null || this.email == '') || (this.password == null || this.password == '')){
                this.msg = 'Debe ingresar todos los datos para poder iniciar sesion';
                this.alert = true;
            }else{
                this.overlay = true;
                this.login();
            }
        },
        async login(){
            try {
                let resLogin = await axios.post('login', {email: this.email, password:this.password});
                if(resLogin.data.login == true){
                    Vue.prototype.$login = true;
                    this.$router.push('/Solicitudes');
                }else{
                    this.msg = 'Los datos ingresados no se han encontrado, por favor ingresar los datos nuevamente';
                    this.alert = true;
                }
                this.overlay = false;
            } catch (error) {
                console.log(error);
                this.msg = 'Hubo un error en el servidor al intentar iniciar sesion';
                this.alert = true;
                this.overlay = false;
            }
        }
    },
    created(){
        if(this.$login == true){
            this.$router.push('/');
        }
    }
}
</script>