<?php

namespace App\Http\Controllers\Api\V1;

use App\Propiedade;
use App\Http\Controllers\Controller;
use App\Http\Resources\Propiedade as PropiedadeResource;
use App\Http\Requests\Admin\StorePropiedadesRequest;
use App\Http\Requests\Admin\UpdatePropiedadesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Traits\FileUploadTrait;


class PropiedadesController extends Controller
{
    public function index()
    {
        

        return new PropiedadeResource(Propiedade::with(['moneda', 'barrio', 'operacion'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('propiedade_view')) {
            return abort(401);
        }

        $propiedade = Propiedade::with(['moneda', 'barrio', 'operacion'])->findOrFail($id);

        return new PropiedadeResource($propiedade);
    }

    public function store(StorePropiedadesRequest $request)
    {
        if (Gate::denies('propiedade_create')) {
            return abort(401);
        }

        $propiedade = Propiedade::create($request->all());
        
        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $key => $file) {
                $propiedade->addMedia($file)->toMediaCollection('imagen');
            }
        }

        return (new PropiedadeResource($propiedade))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePropiedadesRequest $request, $id)
    {
        if (Gate::denies('propiedade_edit')) {
            return abort(401);
        }

        $propiedade = Propiedade::findOrFail($id);
        $propiedade->update($request->all());
        
        $filesInfo = explode(',', $request->input('uploaded_imagen'));
        foreach ($propiedade->getMedia('imagen') as $file) {
            if (! in_array($file->id, $filesInfo)) {
                $file->delete();
            }
        }
        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $key => $file) {
                $propiedade->addMedia($file)->toMediaCollection('imagen');
            }
        }

        return (new PropiedadeResource($propiedade))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('propiedade_delete')) {
            return abort(401);
        }

        $propiedade = Propiedade::findOrFail($id);
        $propiedade->delete();

        return response(null, 204);
    }
}
