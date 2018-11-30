<?php

namespace App\Http\Controllers\Api\V1;

use App\Tipooperacion;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tipooperacion as TipooperacionResource;
use App\Http\Requests\Admin\StoreTipooperacionsRequest;
use App\Http\Requests\Admin\UpdateTipooperacionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class TipooperacionsController extends Controller
{
    public function index()
    {
        

        return new TipooperacionResource(Tipooperacion::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('tipooperacion_view')) {
            return abort(401);
        }

        $tipooperacion = Tipooperacion::with([])->findOrFail($id);

        return new TipooperacionResource($tipooperacion);
    }

    public function store(StoreTipooperacionsRequest $request)
    {
        if (Gate::denies('tipooperacion_create')) {
            return abort(401);
        }

        $tipooperacion = Tipooperacion::create($request->all());
        
        

        return (new TipooperacionResource($tipooperacion))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTipooperacionsRequest $request, $id)
    {
        if (Gate::denies('tipooperacion_edit')) {
            return abort(401);
        }

        $tipooperacion = Tipooperacion::findOrFail($id);
        $tipooperacion->update($request->all());
        
        
        

        return (new TipooperacionResource($tipooperacion))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('tipooperacion_delete')) {
            return abort(401);
        }

        $tipooperacion = Tipooperacion::findOrFail($id);
        $tipooperacion->delete();

        return response(null, 204);
    }
}
