<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Barrio
 *
 * @package App
 * @property string $barrio
*/
class Barrio extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['barrio'];
    

    public static function storeValidation($request)
    {
        return [
            'barrio' => 'min:2|max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'barrio' => 'min:2|max:191|required'
        ];
    }

    

    
    
    
}
