<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StorageApiTest extends TestCase
{
    use MakeStorageTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStorage()
    {
        $storage = $this->fakeStorageData();
        $this->json('POST', '/api/v1/storages', $storage);

        $this->assertApiResponse($storage);
    }

    /**
     * @test
     */
    public function testReadStorage()
    {
        $storage = $this->makeStorage();
        $this->json('GET', '/api/v1/storages/'.$storage->id);

        $this->assertApiResponse($storage->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStorage()
    {
        $storage = $this->makeStorage();
        $editedStorage = $this->fakeStorageData();

        $this->json('PUT', '/api/v1/storages/'.$storage->id, $editedStorage);

        $this->assertApiResponse($editedStorage);
    }

    /**
     * @test
     */
    public function testDeleteStorage()
    {
        $storage = $this->makeStorage();
        $this->json('DELETE', '/api/v1/storages/'.$storage->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/storages/'.$storage->id);

        $this->assertResponseStatus(404);
    }
}
