<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolicitudesModel;
use File;
use Auth;

class SolicitudesController extends Controller{

    /* Se guarda los archivos y luego se crea la solicitud con todos los otros datos */
    public function create(Request $request){
        if($request->file('file_denuncia')){
            $file = $request->file('file_denuncia');
            $name_file_denuncia = $file->getClientOriginalName();
            $file->move(public_path('denuncias/'), $name_file_denuncia);
        }
        if($request->file('file_anexos')){
            $file = $request->file('file_anexos');
            $name_file_anexos = $file->getClientOriginalName();
            $file->move(public_path('anexos/'), $name_file_anexos);
        }
        $filaSolicitud = SolicitudesModel::create([
            'patente' => $request['patente'], 
            'marca' => $request['marca'], 
            'modelo' => $request['modelo'], 
            'version' => $request['version'], 
            'year' => $request['year'], 
            'chasis' => $request['chasis'], 
            'kilometraje' => $request['kilometraje'], 
            'fecha' => $request['fecha'], 
            'franquicia' => $request['franquicia'], 
            'url_denuncia' => (isset($name_file_denuncia)) ? '/denuncias/'. $name_file_denuncia : null, 
            'url_anexos' => (isset($name_file_anexos)) ? '/anexos/'. $name_file_anexos : null, 
            'nombre' => $request['nombre'], 
            'dni' => $request['dni'], 
            'email' => $request['email'], 
            'pais' => $request['pais'], 
            'celular' => $request['pais'], 
            'celular' => $request['celular']]);
        
        return response()->json(['created' => true]);
    }

    /* Envio de todas las solicitudes */
    public function getSolicitudes(){
        $solicitudesDB = SolicitudesModel::get();

        return response()->json(['solicitudesDB' => $solicitudesDB]);
    }
    
}
