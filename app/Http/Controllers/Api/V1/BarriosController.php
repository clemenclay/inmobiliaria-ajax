<?php

namespace App\Http\Controllers\Api\V1;

use App\Barrio;
use App\Http\Controllers\Controller;
use App\Http\Resources\Barrio as BarrioResource;
use App\Http\Requests\Admin\StoreBarriosRequest;
use App\Http\Requests\Admin\UpdateBarriosRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class BarriosController extends Controller
{
    public function index()
    {
        

        return new BarrioResource(Barrio::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('barrio_view')) {
            return abort(401);
        }

        $barrio = Barrio::with([])->findOrFail($id);

        return new BarrioResource($barrio);
    }

    public function store(StoreBarriosRequest $request)
    {
        if (Gate::denies('barrio_create')) {
            return abort(401);
        }

        $barrio = Barrio::create($request->all());
        
        

        return (new BarrioResource($barrio))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateBarriosRequest $request, $id)
    {
        if (Gate::denies('barrio_edit')) {
            return abort(401);
        }

        $barrio = Barrio::findOrFail($id);
        $barrio->update($request->all());
        
        
        

        return (new BarrioResource($barrio))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('barrio_delete')) {
            return abort(401);
        }

        $barrio = Barrio::findOrFail($id);
        $barrio->delete();

        return response(null, 204);
    }
}
