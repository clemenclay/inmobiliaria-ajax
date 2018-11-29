<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Galerium
 *
 * @package App
 * @property string $nombre
*/
class Galerium extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['nombre'];
    protected $appends = ['imagen', 'imagen_link', 'uploaded_imagen'];
    protected $with = ['media'];
    

    public static function storeValidation($request)
    {
        return [
            'nombre' => 'max:191|nullable',
            'imagen' => 'nullable',
            'imagen.*' => 'file|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'nombre' => 'max:191|nullable',
            'imagen' => 'sometimes',
            'imagen.*' => 'file|nullable'
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
        $html = [];
        foreach ($imagen as $file) {
            $html[] = '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
        }

        return implode('<br/>', $html);
    }
    
    
}
