<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Storage
 * @package App\Models
 * @version August 21, 2017, 5:49 pm UTC
 *
 * @method static Storage find($id=null, $columns = array())
 * @method static Storage|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string storage_system_name
 * @property string storage_system_description
 * @property string storage_system_data
 * @property integer user_id
 * @property boolean is_Watchable
 * @property boolean status
 */
class Storage extends Model
{
    use SoftDeletes;

    public $table = 'storage_system';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'storage_system_name',
        'storage_system_description',
        'storage_system_data',
        'user_id',
        'is_Watchable',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'storage_system_id' => 'integer',
        'storage_system_name' => 'string',
        'storage_system_description' => 'string',
        'storage_system_data' => 'string',
        'user_id' => 'integer',
        'is_Watchable' => 'boolean',
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
