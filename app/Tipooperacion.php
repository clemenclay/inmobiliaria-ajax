<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tipooperacion
 *
 * @package App
 * @property string $tipooperacion
*/
class Tipooperacion extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['tipooperacion'];
    

    public static function storeValidation($request)
    {
        return [
            'tipooperacion' => 'min:1|max:40|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'tipooperacion' => 'min:1|max:40|required'
        ];
    }

    

    
    
    
}
