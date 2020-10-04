<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="6">
                <v-card elevation="16">
                    <v-card-title class="text-center">
                        Registrarse
                    </v-card-title>
                    <v-divider class="ma-0"></v-divider>
                    <v-card-text class="pb-0">
                        <v-text-field label="Nombre" prepend-icon="mdi-account" outlined type="text" v-model="nombre" required dense></v-text-field>
                        <v-text-field label="Email" prepend-icon="mdi-account" outlined type="email" v-model="email" required dense></v-text-field>
                        <v-text-field label="Contraseña" prepend-icon="mdi-lock" outlined type="password" v-model="password" required dense></v-text-field>
                        <v-text-field label="Repetir Contraseña" prepend-icon="mdi-lock" outlined type="password" v-model="password_repeat" required @keyup.enter="verificar()" dense></v-text-field>
                        <v-alert dense outlined type="error" v-if="alert == true">
                            {{ msg }}
                        </v-alert>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-btn large="" color="success" type="button" @click="verificar()">Registrarse</v-btn>
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
            email:'',
            nombre:'',
            password:'',
            password_repeat:'',
            alert:false,
            msg:null,
            overlay:false,
        }
    },
    methods: {
        verificar(){
            if(this.nombre == '' || this.email == '' || this.password == '' || this.password_repeat == ''){
                this.msg = 'Debe ingresar todos los datos porfavor.';
                this.alert = true;
            }else{
                if(this.password != this.password_repeat){
                    this.msg = 'Las contraseñas dseben coincidir.';
                    this.alert = true;
                }else{
                    this.overlay = true;
                    this.registrarse();
                }
            }
        },
        async registrarse(){
            try {
                let resRegister = await axios.post('register', {email:this.email,nombre:this.nombre,password:this.password,password_confirmation:this.password_repeat});
                if(resRegister.data.register == true){
                    Vue.prototype.$login = true;
                    this.overlay = false;
                    this.$router.push('/Solicitudes');
                }else{
                    this.msg = resRegister.data.msg_error;
                    this.alert = true;
                    this.overlay = false;
                }
            } catch (error) {
                this.msg = 'Hubo un error al intentar registrarlo como nuevo usuario. Intente de nuevo';
                this.nombre = '';
                this.email = '';
                this.password = '';
                this.password_repeat = '';
                this.alert = true,
                this.overlay = false;
            }
        }
    }
}
</script>