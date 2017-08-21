<?php

namespace App\Repositories;

use App\Models\Storage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StorageRepository
 * @package App\Repositories
 * @version August 21, 2017, 5:49 pm UTC
 *
 * @method Storage findWithoutFail($id, $columns = ['*'])
 * @method Storage find($id, $columns = ['*'])
 * @method Storage first($columns = ['*'])
*/
class StorageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'storage_system_name',
        'storage_system_description',
        'storage_system_data',
        'user_id',
        'is_Watchable',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Storage::class;
    }
}
