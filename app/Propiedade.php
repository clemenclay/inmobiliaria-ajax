<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Propiedade
 *
 * @package App
 * @property string $propiedades
*/
class Propiedade extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['propiedades'];
    

    public static function storeValidation($request)
    {
        return [
            'propiedades' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'propiedades' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
