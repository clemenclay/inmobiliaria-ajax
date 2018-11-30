<?php

namespace App\Http\Controllers\Api\V1;

use App\Moneda;
use App\Http\Controllers\Controller;
use App\Http\Resources\Moneda as MonedaResource;
use App\Http\Requests\Admin\StoreMonedasRequest;
use App\Http\Requests\Admin\UpdateMonedasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class MonedasController extends Controller
{
    public function index()
    {
        

        return new MonedaResource(Moneda::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('moneda_view')) {
            return abort(401);
        }

        $moneda = Moneda::with([])->findOrFail($id);

        return new MonedaResource($moneda);
    }

    public function store(StoreMonedasRequest $request)
    {
        if (Gate::denies('moneda_create')) {
            return abort(401);
        }

        $moneda = Moneda::create($request->all());
        
        

        return (new MonedaResource($moneda))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateMonedasRequest $request, $id)
    {
        if (Gate::denies('moneda_edit')) {
            return abort(401);
        }

        $moneda = Moneda::findOrFail($id);
        $moneda->update($request->all());
        
        
        

        return (new MonedaResource($moneda))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('moneda_delete')) {
            return abort(401);
        }

        $moneda = Moneda::findOrFail($id);
        $moneda->delete();

        return response(null, 204);
    }
}
