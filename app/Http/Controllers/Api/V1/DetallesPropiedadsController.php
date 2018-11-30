<?php

namespace App\Http\Controllers\Api\V1;

use App\DetallesPropiedad;
use App\Http\Controllers\Controller;
use App\Http\Resources\DetallesPropiedad as DetallesPropiedadResource;
use App\Http\Requests\Admin\StoreDetallesPropiedadsRequest;
use App\Http\Requests\Admin\UpdateDetallesPropiedadsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class DetallesPropiedadsController extends Controller
{
    public function index()
    {
        return new DetallesPropiedadResource(DetallesPropiedad::all());
    }
}
