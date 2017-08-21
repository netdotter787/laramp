<?php

use App\Models\Storage;
use App\Repositories\StorageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StorageRepositoryTest extends TestCase
{
    use MakeStorageTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StorageRepository
     */
    protected $storageRepo;

    public function setUp()
    {
        parent::setUp();
        $this->storageRepo = App::make(StorageRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStorage()
    {
        $storage = $this->fakeStorageData();
        $createdStorage = $this->storageRepo->create($storage);
        $createdStorage = $createdStorage->toArray();
        $this->assertArrayHasKey('id', $createdStorage);
        $this->assertNotNull($createdStorage['id'], 'Created Storage must have id specified');
        $this->assertNotNull(Storage::find($createdStorage['id']), 'Storage with given id must be in DB');
        $this->assertModelData($storage, $createdStorage);
    }

    /**
     * @test read
     */
    public function testReadStorage()
    {
        $storage = $this->makeStorage();
        $dbStorage = $this->storageRepo->find($storage->id);
        $dbStorage = $dbStorage->toArray();
        $this->assertModelData($storage->toArray(), $dbStorage);
    }

    /**
     * @test update
     */
    public function testUpdateStorage()
    {
        $storage = $this->makeStorage();
        $fakeStorage = $this->fakeStorageData();
        $updatedStorage = $this->storageRepo->update($fakeStorage, $storage->id);
        $this->assertModelData($fakeStorage, $updatedStorage->toArray());
        $dbStorage = $this->storageRepo->find($storage->id);
        $this->assertModelData($fakeStorage, $dbStorage->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStorage()
    {
        $storage = $this->makeStorage();
        $resp = $this->storageRepo->delete($storage->id);
        $this->assertTrue($resp);
        $this->assertNull(Storage::find($storage->id), 'Storage should not exist in DB');
    }
}
