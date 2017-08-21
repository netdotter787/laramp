<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Location
 * @package App\Models
 * @version August 21, 2017, 6:03 pm UTC
 *
 * @method static Location find($id=null, $columns = array())
 * @method static Location|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string storage_path
 * @property integer storage_system_id
 * @property string storage_path_data
 * @property integer user_id
 * @property boolean status
 */
class Location extends Model
{
    use SoftDeletes;

    public $table = 'storage_path';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'storage_path',
        'storage_system_id',
        'storage_path_data',
        'user_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'storage_path_id' => 'integer',
        'storage_path' => 'string',
        'storage_system_id' => 'integer',
        'storage_path_data' => 'string',
        'user_id' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
