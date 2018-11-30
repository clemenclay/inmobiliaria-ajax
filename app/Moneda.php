<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Moneda
 *
 * @package App
 * @property string $moneda
*/
class Moneda extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['moneda'];
    

    public static function storeValidation($request)
    {
        return [
            'moneda' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'moneda' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
