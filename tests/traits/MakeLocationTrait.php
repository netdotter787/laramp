<?php

use Faker\Factory as Faker;
use App\Models\Location;
use App\Repositories\LocationRepository;

trait MakeLocationTrait
{
    /**
     * Create fake instance of Location and save it in database
     *
     * @param array $locationFields
     * @return Location
     */
    public function makeLocation($locationFields = [])
    {
        /** @var LocationRepository $locationRepo */
        $locationRepo = App::make(LocationRepository::class);
        $theme = $this->fakeLocationData($locationFields);
        return $locationRepo->create($theme);
    }

    /**
     * Get fake instance of Location
     *
     * @param array $locationFields
     * @return Location
     */
    public function fakeLocation($locationFields = [])
    {
        return new Location($this->fakeLocationData($locationFields));
    }

    /**
     * Get fake data of Location
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLocationData($locationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'storage_path' => $fake->text,
            'storage_system_id' => $fake->randomDigitNotNull,
            'storage_path_data' => $fake->text,
            'user_id' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $locationFields);
    }
}
