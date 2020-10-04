<template>
    <v-container>
        <v-row>
            <v-col>
                <v-card>
                    <v-card-title>
                        Solicitudes guardadas
                    </v-card-title>
                    <v-card-text>
                        <pre v-for="item in solicitudesDB" :key="item.id">
                            {{ item }}
                        </pre>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate color="dark" size="60"></v-progress-circular>
        </v-overlay>
    </v-container>
</template>

<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                solicitudesDB:null,
                overlay:true,
            }
        },
        async created(){
            try{
                let solicitudesDB = await axios.post('solicitud/get');
                this.solicitudesDB = solicitudesDB.data;
                this.overlay = false;
            } catch (error) {
                console.log(error);
            }
        }
    }
</script>