<template>
    <v-container>
        <v-row>
            <v-col>
                <h2 v-if="$login == true">Bienvenido usuario</h2>
                <br>
                <v-card elevation="12">
                    <v-card-title class="pl-2 pb-0">
                        <h4>Nueva solicitud</h4>
                    </v-card-title>
                    <v-card-text class="pl-2 pr-0">
                        <v-row>
                            <v-col cols="12" class="pb-2">
                                <h6 class="subtitulo">Datos de la unidad</h6>
                                <hr class="lineaD ma-0"/>
                            </v-col>
                        </v-row>
                        <v-row class="pr-3">
                            <v-col cols="12" sm="6" md="3" class="pr-1">
                                <input type="text" class="form-control focus" placeholder="Patente" v-model="data.patente">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class="pr-1 pl-1">
                                <input type="number" class="form-control focus" placeholder="Marca" v-model="data.marca">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class="pr-1 pl-1">
                                <input type="number" class="form-control focus" placeholder="Modelo" v-model="data.modelo">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class=" pl-1">
                                <input type="number" class="form-control focus" placeholder="Version" v-model="data.version">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class="pr-1">
                                <input type="number" class="form-control focus" placeholder="Año" v-model="data.year">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class="pr-1 pl-1">
                                <input type="text" class="form-control focus" placeholder="Chasis" v-model="data.chasis">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class=" pl-1">
                                <input type="text" class="form-control focus" placeholder="Kilometraje" v-model="data.kilometraje">
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" class="pb-2">
                                <h6 class="subtitulo">Datos de poliza</h6>
                                <hr class="lineaD ma-0"/>
                            </v-col>
                        </v-row>
                        <v-row class="pr-3">
                            <v-col cols="12" sm="6" md="3" class="pr-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <v-icon small class="input-group-text">fa-calendar</v-icon>
                                    </div>
                                    <input type="date" class="form-control focus" placeholder="Fecha" v-model="data.fecha">
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class="pr-1 pl-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            $
                                        </span>
                                    </div>
                                    <input type="text" class="form-control focus" placeholder="Franquicia" v-model="data.franquicia">
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="3" @click="$refs.file_denuncia.click()" class="pr-1 pl-1">
                                <div class="input-group mb-3 pointer">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <v-icon small>fa-file</v-icon>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control pointer" placeholder="Denuncia" disabled v-model="file_denuncia.name">
                                    <input type="file" :style="{display: 'none'}" ref="file_denuncia" @change="guardarArchivo($event.target.files, 'd')">
                                    <div class="input-group-append border-radius-left">
                                        <span class="input-group-text icon-plus">+</span>
                                    </div>
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="3" @click="$refs.file_anexo.click()" class=" pl-1">
                                <div class="input-group mb-3 pointer">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <v-icon small>fa-files-o</v-icon>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control pointer" placeholder="Anexos" disabled v-model="file_anexos.name">
                                    <input type="file" :style="{display: 'none'}" ref="file_anexo" @change="guardarArchivo($event.target.files, 'a')">
                                    <div class="input-group-append border-radius-left">
                                        <span class="input-group-text icon-plus">+</span>
                                    </div>
                                </div>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" class="pb-2">
                                <h6 class="subtitulo">Datos de contacto</h6>
                                <hr class="lineaD ma-0"/>
                            </v-col>
                        </v-row>
                        <v-row class="pr-3">
                            <v-col cols="12" sm="6" md="3" class="pr-1">
                                <input type="text" class="form-control focus" placeholder="Nombre" v-model="data.nombre">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class="pr-1 pl-1">
                                <input type="text" class="form-control focus" placeholder="DNI" v-model="data.dni">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class="pr-1 pl-1">
                                <input type="text" class="form-control focus" placeholder="Email" v-model="data.email">
                            </v-col>
                            <v-col cols="12" sm="6" md="3" class="pl-1">
                                <div class="input-group">
                                    <div class="input-group-prepend input-bandera">
                                        <span class="input-group-text pt-0 pb-0 pl-3 pr-3" :style="{background: 'transparent'}">
                                            <v-menu offset-y class="prueba">
                                                <template v-slot:activator="{ on }">
                                                    <v-btn v-on="on" small icon class="btn-pais">
                                                        <img :src="src" class="img-pais">
                                                    </v-btn>
                                                </template>

                                                <v-list>
                                                    <v-list-item @click="cambiarPais('arg')" class="fondo-naranja">
                                                        <v-list-item-title>
                                                            <img src="https://lh3.googleusercontent.com/hJYR1VuvgAKnVNZ7MPSXcbBf3TaDPygxBqh5fEnvGIRfOSJ0rvS8rnxOXBiWOOg3kXU=w500-h280-rw" class="img-pais">
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                    <v-list-item  @click="cambiarPais('col')" class="fondo-naranja">
                                                        <v-list-item-title>
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/1200px-Flag_of_Colombia.svg.png" class="img-pais">
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                    <v-list-item  @click="cambiarPais('ecu')" class="fondo-naranja">
                                                        <v-list-item-title>
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Flag_of_Ecuador.svg" class="img-pais">
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                    <v-list-item  @click="cambiarPais('bol')" class="fondo-naranja">
                                                        <v-list-item-title>
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Bolivia.svg/1200px-Flag_of_Bolivia.svg.png" class="img-pais">
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                </v-list>
                                            </v-menu>
                                        </span>
                                        <input type="text" class="form-control focus pref" placeholder="Pref." v-model="data.pref">
                                    </div>
                                    <input type="text" class="form-control focus" placeholder="Celular" v-model="data.celular">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text pointer" :style="{background: 'transparent'}" @click="data.celular = '';data.pref = ''">
                                            <v-icon small color="red darken-4">fa-remove</v-icon>
                                        </span>
                                    </div>
                                </div>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn block class="color-naranja" color="white--text" @click="enviarSolicitud()">Enviar</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
        <!-- Overlay para la carga de datos -->
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate color="dark" size="60"></v-progress-circular>
        </v-overlay>
        <!-- Alert para cuando se crea una nueva solicitud -->
        <v-snackbar
                :timeout="5000"
                v-model="alert_create"
                absolute
                bottom
                :color="color_alert"
                rounded=""
            >
                <strong>{{ msj }}</strong>
                <template v-slot:action="{ attrs }">
                    <v-btn
                    color="white"
                    v-bind="attrs"
                    @click="alert_create = false"
                    text
                    >
                        <v-icon>mdi-close-circle</v-icon>
                    </v-btn>
                </template>
            </v-snackbar>
    </v-container>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Inicio',
        data(){
            /* Se inicializan todas las variables */
            return {
                file_denuncia: {
                    file:null,
                    name:null
                },
                file_anexos: {
                    file:null,
                    name:null
                },
                data:{
                    patente:null,
                    marca:null,
                    modelo:null,
                    version:null,
                    year:null,
                    chasis:null,
                    kilometraje:null,
                    fecha:null,
                    franquicia:null,
                    nombre:null,
                    dni:null,
                    email:null,
                    pref:null,
                    celular:null,
                    pais:'Argentina'
                },
                on:false,
                src: 'https://lh3.googleusercontent.com/hJYR1VuvgAKnVNZ7MPSXcbBf3TaDPygxBqh5fEnvGIRfOSJ0rvS8rnxOXBiWOOg3kXU=w500-h280-rw',
                overlay: false,
                alert_create: false,
                msj: null,
                color_alert: null,
            }
        },
        methods: {
            /* Capturamos el archivo que se selecciona y lo guardamos dentro de la variable correspondiente */
            guardarArchivo(file, tipo){
                if(tipo == 'd'){
                    this.file_denuncia.file = file[0];
                    this.file_denuncia.name = file[0].name;
                }else{
                    this.file_anexos.file = file[0];
                    this.file_anexos.name = file[0].name;
                    
                }
            },
            /* Para cuando se selecciona otra bandera */
            cambiarPais(pais){
                if(pais == 'arg'){
                    this.data.pais = 'Argentina';
                    this.src = 'https://lh3.googleusercontent.com/hJYR1VuvgAKnVNZ7MPSXcbBf3TaDPygxBqh5fEnvGIRfOSJ0rvS8rnxOXBiWOOg3kXU=w500-h280-rw';
                }else if(pais == 'col'){
                    this.data.pais = 'Colombia';
                    this.src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/1200px-Flag_of_Colombia.svg.png';
                }else if(pais == 'ecu'){
                    this.data.pais = 'Ecuador';
                    this.src = 'https://upload.wikimedia.org/wikipedia/commons/e/e8/Flag_of_Ecuador.svg';
                }else if(pais == 'bol'){
                    this.data.pais = 'Bolivia';
                    this.src = 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Bolivia.svg/1200px-Flag_of_Bolivia.svg.png';
                }
            },
            /* Enviamos la solicitud */
            async enviarSolicitud(){
                this.overlay = true;
                try {
                    /* Utilizamos una variable que inicia FormData para guardar todos los datos que debemos enviar */
                    const formData = new FormData;
                    formData.append('patente', this.data.patente);
                    formData.append('marca', this.data.marca);
                    formData.append('modelo', this.data.modelo);
                    formData.append('version', this.data.version);
                    formData.append('year', this.data.year);
                    formData.append('chasis', this.data.chasis);
                    formData.append('kilometraje', this.data.kilometraje);
                    formData.append('fecha', this.data.fecha);
                    formData.append('franquicia', this.data.franquicia);
                    formData.append('file_denuncia', this.file_denuncia.file, this.file_denuncia.name);
                    formData.append('file_anexos', this.file_anexos.file, this.file_anexos.name);
                    console.log(this.file_anexos);
                    formData.append('nombre', this.data.nombre);
                    formData.append('dni', this.data.dni);
                    formData.append('email', this.data.email);
                    formData.append('celular', this.data.pref +'-'+this.data.celular);
                    formData.append('pais', this.data.pais);
                    let resSolicitud = await axios.post('solicitud/create', formData);
                    if(resSolicitud.data.created == true){
                        this.msj = 'Se creo correctamente la solicitud';
                        this.color_alert = 'success';
                    }else{
                        this.msj = 'Hubo un error en el servidor. Intentelo de nuevo';
                        this.color_alert = 'error';
                    }
                    /* Volvemos a poner al formulario como al principio para una nueva solicitud */
                    this.data.patente = null;
                    this.data.marca = null;
                    this.data.modelo = null;
                    this.data.version = null;
                    this.data.year = null;
                    this.data.chasis = null;
                    this.data.kilometraje = null;
                    this.data.fecha = null;
                    this.data.franquicia = null;
                    this.file_denuncia.file = null;
                    this.file_denuncia.name = null;
                    this.file_anexos.file = null;
                    this.file_anexos.name = null;
                    this.data.nombre = null;
                    this.data.dni = null;
                    this.data.email = null;
                    this.data.pref = null;
                    this.data.celular = null;
                    this.data.pais = 'Argentina';
                    this.src = 'https://lh3.googleusercontent.com/hJYR1VuvgAKnVNZ7MPSXcbBf3TaDPygxBqh5fEnvGIRfOSJ0rvS8rnxOXBiWOOg3kXU=w500-h280-rw';
                    this.overlay = false;
                    this.alert_create = true;
                } catch (error) {
                    console.log(error);
                }
            }
        }
    }
</script>

<style scoped>
    @import url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    .v-menu__content{
        max-width: 5%;
    }
</style>