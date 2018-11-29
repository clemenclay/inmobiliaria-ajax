<?php

namespace App\Http\Controllers\Api\V1;

use App\Galerium;
use App\Http\Controllers\Controller;
use App\Http\Resources\Galerium as GaleriumResource;
use App\Http\Requests\Admin\StoreGaleriasRequest;
use App\Http\Requests\Admin\UpdateGaleriasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Traits\FileUploadTrait;


class GaleriasController extends Controller
{
    public function index()
    {
        

        return new GaleriumResource(Galerium::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('galerium_view')) {
            return abort(401);
        }

        $galerium = Galerium::with([])->findOrFail($id);

        return new GaleriumResource($galerium);
    }

    public function store(StoreGaleriasRequest $request)
    {
        if (Gate::denies('galerium_create')) {
            return abort(401);
        }

        $galerium = Galerium::create($request->all());
        
        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $key => $file) {
                $galerium->addMedia($file)->toMediaCollection('imagen');
            }
        }

        return (new GaleriumResource($galerium))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateGaleriasRequest $request, $id)
    {
        if (Gate::denies('galerium_edit')) {
            return abort(401);
        }

        $galerium = Galerium::findOrFail($id);
        $galerium->update($request->all());
        
        $filesInfo = explode(',', $request->input('uploaded_imagen'));
        foreach ($galerium->getMedia('imagen') as $file) {
            if (! in_array($file->id, $filesInfo)) {
                $file->delete();
            }
        }
        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $key => $file) {
                $galerium->addMedia($file)->toMediaCollection('imagen');
            }
        }

        return (new GaleriumResource($galerium))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('galerium_delete')) {
            return abort(401);
        }

        $galerium = Galerium::findOrFail($id);
        $galerium->delete();

        return response(null, 204);
    }
}
