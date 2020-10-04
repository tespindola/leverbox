<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesModel extends Model{
    use HasFactory;
    protected $table = 'solicitudes';

    protected $fillable = ['patente', 'marca', 'modelo', 'version', 'year', 'chasis', 'kilometraje', 'fecha', 'franquicia', 'url_denuncia', 'url_anexos', 'nombre', 'dni', 'email', 'pais', 'celular'];
}
