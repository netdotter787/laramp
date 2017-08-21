<?php

use Faker\Factory as Faker;
use App\Models\Storage;
use App\Repositories\StorageRepository;

trait MakeStorageTrait
{
    /**
     * Create fake instance of Storage and save it in database
     *
     * @param array $storageFields
     * @return Storage
     */
    public function makeStorage($storageFields = [])
    {
        /** @var StorageRepository $storageRepo */
        $storageRepo = App::make(StorageRepository::class);
        $theme = $this->fakeStorageData($storageFields);
        return $storageRepo->create($theme);
    }

    /**
     * Get fake instance of Storage
     *
     * @param array $storageFields
     * @return Storage
     */
    public function fakeStorage($storageFields = [])
    {
        return new Storage($this->fakeStorageData($storageFields));
    }

    /**
     * Get fake data of Storage
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStorageData($storageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'storage_system_name' => $fake->word,
            'storage_system_description' => $fake->text,
            'storage_system_data' => $fake->text,
            'user_id' => $fake->randomDigitNotNull,
            'is_Watchable' => $fake->word,
            'status' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $storageFields);
    }
}
