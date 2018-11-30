<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Propiedade
 *
 * @package App
 * @property tinyInteger $publicado
 * @property string $titulo
 * @property string $descripcion
 * @property decimal $precio
 * @property string $moneda
 * @property string $barrio
 * @property string $operacion
*/
class Propiedade extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['publicado', 'titulo', 'descripcion', 'precio', 'moneda_id', 'barrio_id', 'operacion_id'];
    protected $appends = ['imagen', 'imagen_link', 'uploaded_imagen'];
    protected $with = ['media'];
    

    public static function storeValidation($request)
    {
        return [
            'publicado' => 'boolean|nullable',
            'titulo' => 'min:4|max:191|required',
            'descripcion' => 'min:10|max:191|required',
            'imagen' => 'nullable',
            'imagen.*' => 'file|image|nullable',
            'precio' => 'numeric|required',
            'moneda_id' => 'integer|exists:monedas,id|max:4294967295|nullable',
            'barrio_id' => 'integer|exists:barrios,id|max:4294967295|required',
            'operacion_id' => 'integer|exists:tipooperacions,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'publicado' => 'boolean|nullable',
            'titulo' => 'min:4|max:191|required',
            'descripcion' => 'min:10|max:191|required',
            'imagen' => 'sometimes',
            'imagen.*' => 'file|image|nullable',
            'precio' => 'numeric|required',
            'moneda_id' => 'integer|exists:monedas,id|max:4294967295|nullable',
            'barrio_id' => 'integer|exists:barrios,id|max:4294967295|required',
            'operacion_id' => 'integer|exists:tipooperacions,id|max:4294967295|nullable'
        ];
    }

    

    public function getImagenAttribute()
    {
        return [];
    }

    public function getUploadedImagenAttribute()
    {
        return $this->getMedia('imagen')->keyBy('id');
    }

    /**
     * @return string
     */
    public function getImagenLinkAttribute()
    {
        
       
        $imagen = $this->getMedia('imagen');
        
        if (! count($imagen)) {
            return null;
        }
        $html = ['<div class="col-md-12" >
        '];
        
        foreach ($imagen as $file) {
            $html[] = '

            <div class="modal fade" id="'. $file->id .'" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                  <img src="' . $file->getUrl() . '" class="col-md-12">
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>


        

          <a style="cursor: pointer;" class="col-md-6" data-toggle="modal" data-target="#'. $file->id .'">
          <img src="' . $file->getUrl() . '" class="col-md-12">
        </a>
            
           
            '
            ;
        }

        return implode($html);

    }
    
    public function moneda()
    {
        return $this->belongsTo(Moneda::class, 'moneda_id')->withTrashed();
    }
    
    public function barrio()
    {
        return $this->belongsTo(Barrio::class, 'barrio_id')->withTrashed();
    }
    
    public function operacion()
    {
        return $this->belongsTo(Tipooperacion::class, 'operacion_id')->withTrashed();
    }
    
    
}
